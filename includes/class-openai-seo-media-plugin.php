<?php

class Openai_Seo_Media_Plugin {

    protected $loader;

    protected $plugin_name;

    protected $version;

    public function __construct() {
        $this->plugin_name = 'openai-seo-media-plugin';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->define_admin_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-openai-seo-media-plugin-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-openai-seo-media-plugin-admin.php';

        $this->loader = new Openai_Seo_Media_Plugin_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new Openai_Seo_Media_Plugin_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_menu', $plugin_admin, 'openai_seo_media_menu');
        $this->loader->add_action('admin_init', $plugin_admin, 'openai_seo_media_settings_init');
        $this->loader->add_filter('media_row_actions', $plugin_admin, 'add_generate_seo_button', 10, 2);
        $this->loader->add_action('wp_ajax_generate_seo_content', $plugin_admin, 'generate_seo_content_ajax');
        $this->loader->add_action('add_meta_boxes', $plugin_admin, 'add_seo_meta_box');
        $this->loader->add_filter('bulk_actions-upload', $plugin_admin, 'register_bulk_actions');
        $this->loader->add_filter('handle_bulk_actions-upload', $plugin_admin, 'handle_bulk_action', 10, 3);
        $this->loader->add_action('admin_notices', $plugin_admin, 'admin_notices');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }

}
