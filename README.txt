=== OpenAI SEO Media Generator ===
Contributors: Dagoberto Medina
Tags: SEO, OpenAI, media, WordPress
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.2
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically generate SEO-friendly titles, alt texts, and descriptions for media files using OpenAI's API.

== Description ==

**OpenAI SEO Media Generator** is a WordPress plugin that leverages the power of the OpenAI API to automatically generate SEO-friendly content for your media files. This plugin is perfect for those who manage large volumes of media and need an efficient and scalable solution to improve their website's SEO.

**Features:**
- Automatic SEO Content Generation
- Support for GPT-4o and GPT-4o-mini models
- Seamless WordPress Integration
- Configuration Warnings

**Requirements:**
- OpenAI Account: You need an OpenAI account and a valid API key to use this plugin.
- WordPress 5.0 or higher

== Installation ==

1. Download the Plugin: Download the ZIP file from the repository.
2. Upload and Install: Go to `Plugins > Add New` in your WordPress admin panel, select `Upload Plugin`, choose the ZIP file, and click `Install Now`.
3. Activate the Plugin: Once installed, activate the plugin from the plugins list.
4. Configure your API Key: Go to `Settings > OpenAI SEO Media` and enter your OpenAI API key.

== Usage ==

1. **Upload the Plugin:** Upload the ZIP file from the plugin to your WordPress site.
2. **Configure the API Key:** Go to `Settings > OpenAI SEO Media` or directly to `wp-admin/options-general.php?page=openai-seo-media-generator` and paste the API key you generated from the OpenAI dashboard.
3. **Access the Media Library:** Navigate to the Media Library.
4. **Switch to List Mode:** Set the Media Library to list view mode.
5. **Generate SEO for Images:**
   - **Single Image:** Click "Generate SEO" next to the image you want to optimize.
   - **Bulk Action:** Select multiple images, choose "Generate SEO with OpenAI" from the bulk actions dropdown, and click "Apply" to generate SEO for all selected images at once.

**From the Media Library:** In the media list, you will see a new "Generate SEO" button next to each media file. Click this button to automatically generate SEO-friendly titles, descriptions, and alt text.

**From the Media Editor:** When you open a media file to edit it, you'll find a new section in the right-hand panel that allows you to generate SEO content directly from the media editor. If you haven’t configured your API key, the plugin will show a warning.

== Guide and Explanation ==

For a detailed guide on how this plugin was developed and how to use it, check out my Medium post: [How I Automated SEO for WordPress Media Using OpenAI](https://medinazdago.medium.com/how-i-automated-seo-for-wordpress-media-using-openai-41592533d253)

== Frequently Asked Questions ==

= What does this plugin do? =
This plugin automates the generation of SEO-friendly content (title, alt text, description) for media files using OpenAI's API.

= How do I get an OpenAI API key? =
You can get an API key by creating an account at [OpenAI's website](https://platform.openai.com/account/api-keys).

= What are the costs associated with using this plugin? =
The costs depend on the number of tokens used. With $1, you can process 74 to 95 images using GPT-4o or 148 to 190 images using GPT-4o-mini.


== Changelog ==

= 1.0 =
* Initial release of OpenAI SEO Media Generator.

== Upgrade Notice ==

= 1.0 =
Initial release.

== License ==

This plugin is licensed under the GPLv2 or later.