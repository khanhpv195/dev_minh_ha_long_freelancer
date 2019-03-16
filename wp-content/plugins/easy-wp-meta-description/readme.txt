=== Easy WP Meta Description ===
Contributors: matswes
Donate link: https://westholm.software/donate/
Tags: meta, description, header, head, meta description, seo
Requires at least: 3.1
Tested up to: 5.1
Stable tag: 1.2.3
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple and easy to use wordpress plugin to add the meta description tag in html head

== Description ==
This plugin lets the user write a separate description for each post, page, front page or custom post type post which is added as a meta description to the html head.

The individual description for a post or page is typed and edited in a separate text field just below the text field for editing the post text.

You can also add meta description to category, tag and custom taxonomy archive as well as front page.

To add description to a category, go to Dashboard > Posts > Categories. Select a category in the table to the wright or create a new category. Type the description in the text field Description, Weather or not this description will be viewed for visitors on the site is up to each theme. The Easy WP Meta Description plugin will add the description as meta information in the html head.

Descriptions for tag and custom taxonomies are edited in similar fashion.

To edit a front page description you would go to Dashboard > Settings > General and edit Front page meta description.
If you use a static page as Front page the static page Meta description will be used and Front page meta description at general setting will now show.

This plugin relies on the wp_head() action hook. It will only work if the theme uses it. Most themes do.

When deleted uninstall script runs which deletes all changes in the database perfomed by the plugin.
If you dont want to delete your descriptions and other settings only deactivate and dont delete.

Tested with Gutenberg.

= Docs & Support =
You will find more and updated information about the plugin at the plugin [website](https://westholm.software/wordpress-plugin/meta-description/)

== Installation ==

= From your WordPress dashboard =

Go to Dashboard > Plugins > Add New
Search for 'Easy WP Meta Description'
Click install
Click Activate Plugin

= From WordPress.org =

Download the package from wordpress.org Plugin Directory
Unzip the files
Upload the unzipped files with FTP to the plugin directory in your wordpress installation
Go to Dashboard > Plugins to activate

== Frequently Asked Questions ==

How to translate the plugin?

Use the file wp-content/plugins/easy-wp-meta-description/languages/easy-wp-meta-description.pot and Poedit to create a .mo file for your language. Put the file in wp-content/plugins/easy-wp-meta-description/languages.

== Screenshots ==

1. Type your description

== Changelog ==

1.1 Character count function added

1.2 Field for edit Front page meta description has been added.
Uninstall script added which deletes all changes in database

1.2.1 Character count function added to front page form field

1.2.2 Plugin and auther url changed

1.2.3 Meta description disabled when pagination to avoid duplicate meta description
