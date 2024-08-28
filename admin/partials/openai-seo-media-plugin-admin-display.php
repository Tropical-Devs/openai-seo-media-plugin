<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://yoviajocr.com
 * @since      1.0.0
 *
 * @package    Openai_Seo_Media_Plugin
 * @subpackage Openai_Seo_Media_Plugin/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1>OpenAI SEO Media Generator</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('openai_seo_media_settings');
        do_settings_sections('openai-seo-media-generator');
        submit_button();
        ?>
    </form>
</div>

