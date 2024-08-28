<?php

class Openai_Seo_Media_Plugin_Admin {

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function openai_seo_media_menu() {
        add_options_page(
            'OpenAI SEO Media Generator',
            'OpenAI SEO Media',
            'manage_options',
            'openai-seo-media-generator',
            array($this, 'openai_seo_media_settings_page')
        );
    }

    public function openai_seo_media_settings_page() {
        include_once 'partials/openai-seo-media-plugin-admin-display.php';
    }

    public function openai_seo_media_settings_init() {
        register_setting('openai_seo_media_settings', 'openai_api_key');
        register_setting('openai_seo_media_settings', 'openai_seo_language');
        register_setting('openai_seo_media_settings', 'openai_model');

        add_settings_section(
            'openai_seo_media_section',
            'Configuración de OpenAI',
            null,
            'openai-seo-media-generator'
        );

        add_settings_field(
            'openai_api_key',
            'Clave API de OpenAI',
            array($this, 'openai_api_key_render'),
            'openai-seo-media-generator',
            'openai_seo_media_section'
        );

        add_settings_field(
            'openai_seo_language',
            'Idioma para SEO',
            array($this, 'openai_seo_language_render'),
            'openai-seo-media-generator',
            'openai_seo_media_section'
        );

        add_settings_field(
            'openai_model',
            'Modelo de OpenAI',
            array($this, 'openai_model_render'),
            'openai-seo-media-generator',
            'openai_seo_media_section'
        );

    }

    public function sanitize_api_key($input) {
        $current_api_key = get_option('openai_api_key');
        if (empty($input) && !empty($current_api_key)) {
            return $current_api_key;
        }
        return sanitize_text_field($input);
    }

    public function openai_api_key_render() {
        $api_key = get_option('openai_api_key');
        $masked_api_key = !empty($api_key) ? str_repeat('*', strlen($api_key)) : '';
        ?>
        <input type="text" name="openai_api_key" value="<?php echo esc_attr($masked_api_key); ?>" class="regular-text" id="openai_api_key">
        <button type="button" id="edit_api_key" class="button">Editar clave API</button>
        <p><small>Para obtener su clave API de OpenAI, acceda a su <a href="https://platform.openai.com/account/api-keys" target="_blank">dashboard de OpenAI</a>, genere una nueva clave si es necesario, y cópiela aquí.</small></p>
        <script type="text/javascript">
            document.getElementById('edit_api_key').addEventListener('click', function() {
                document.getElementById('openai_api_key').value = '';
                document.getElementById('openai_api_key').focus();
            });
        </script>
        <?php
    }

    public function openai_model_render() {
        $model = get_option('openai_model', 'gpt-4o');
        ?>
        <select name="openai_model">
            <option value="gpt-4o" <?php selected($model, 'gpt-4o'); ?>>GPT-4o - Más preciso, pero más costoso y más lento</option>
            <option value="gpt-4o-mini" <?php selected($model, 'gpt-4o-mini'); ?>>GPT-4o-mini - Más eficiente en costo y tiempo, pero podría ser menos preciso</option>
        </select>
        <p><small>Seleccione el modelo según sus necesidades. GPT-4o es ideal para máxima precisión, mientras que GPT-4o-mini es más económico y rápido, aunque puede ser menos preciso.</small></p>
        <?php
    }

    public function openai_seo_language_render() {
        $language = get_option('openai_seo_language', 'English');
        ?>
        <select name="openai_seo_language">
            <option value="English" <?php selected($language, 'English'); ?>>English</option>
            <option value="Spanish" <?php selected($language, 'Spanish'); ?>>Español</option>
        </select>
        <?php
    }


    public function add_generate_seo_button($actions, $post) {
        if ($post->post_type === 'attachment') {
            $actions['generate_seo'] = '<a href="' . admin_url('admin-ajax.php?action=generate_seo_content&media_id=' . $post->ID) . '">Generar SEO</a>';
        }
        return $actions;
    }

    public function generate_seo_content_ajax() {
        if (isset($_GET['media_id'])) {
            $this->update_media_seo(intval($_GET['media_id']));
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    private function generate_seo_content_with_openai($media_id) {
        $api_key = get_option('openai_api_key');
        $media_url = wp_get_attachment_url($media_id);
        $language = get_option('openai_seo_language', 'Spanish');
        $model = get_option('openai_model', 'gpt-4o');

        $prompt = "Generate SEO-friendly content for an image at the following URL: $media_url.
    The content must be in $language.
    Please return the content as a JSON object with the following structure:
    {
        \"title\": \"\",
        \"alt\": \"\",
        \"description\": \"\"
    }
    Do not include any extra text or labels outside of this JSON structure.";

        $response = wp_remote_post('https://api.openai.com/v1/chat/completions', array(
            'body' => json_encode(array(
                'model' => $model,
                'messages' => array(
                    array(
                        'role' => 'system',
                        'content' => 'You are an SEO expert. Generate SEO-friendly content.'
                    ),
                    array(
                        'role' => 'user',
                        'content' => $prompt
                    )
                ),
                'max_tokens' => 400,
            )),
            'headers' => array(
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json',
            ),
        ));

        if (is_wp_error($response)) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (!empty($data['choices'][0]['message']['content'])) {
            return $data['choices'][0]['message']['content'];
        }

        return false;
    }

    private function update_media_seo($media_id) {
        $seo_content = $this->generate_seo_content_with_openai($media_id);

        if ($seo_content) {
            $content_array = json_decode($seo_content, true);

            $title = isset($content_array['title']) ? sanitize_text_field($content_array['title']) : '';
            $alt = isset($content_array['alt']) ? sanitize_text_field($content_array['alt']) : '';
            $description = isset($content_array['description']) ? sanitize_text_field($content_array['description']) : '';

            wp_update_post(array(
                'ID'           => $media_id,
                'post_title'   => $title,
                'post_content' => $description,
            ));

            update_post_meta($media_id, '_wp_attachment_image_alt', $alt);
        }
    }

    public function add_seo_meta_box() {
        add_meta_box(
            'openai_seo_meta_box',
            'Generar SEO con OpenAI',
            array($this, 'render_seo_meta_box'),
            'attachment',
            'side',
            'default'
        );
    }

    public function render_seo_meta_box($post) {
        $api_key = get_option('openai_api_key');

        if (empty($api_key)) {
            echo '<p style="color: red;">Advertencia: No se ha ingresado una API key de OpenAI. Por favor, ve a las configuraciones del plugin para agregarla.</p>';
        } else {
            echo '<p>Utiliza el botón de abajo para generar automáticamente contenido SEO-friendly para este archivo multimedia.</p>';
            echo '<a href="' . admin_url('admin-ajax.php?action=generate_seo_content&media_id=' . $post->ID) . '" class="button button-primary">Generar SEO</a>';
        }
    }


}
