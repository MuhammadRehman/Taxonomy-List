=== Taxonomy List ===
Contributors: Muhammad Rehman
Tags: taxonomy list, taxonomy list shortcode, category, taxonomy plugin, taxonomy list plugin, taxonomy terms, post category list, post categories list, post category
Requires at least: 4.0
Tested up to: 5.0.3
Stable tag: 1.0.2
License: GPLv2
License URI: GPLv2

== Description ==
This plugin help you to display any taxonomy terms by using shortcode. you can use the shortcode any where like in pages, post, widgets. You can filter the taxonomy terms by typing their related words in the search bar, you can enable/disabled search bar field from the shortcode attribute.

	- [taxonomy_list name="taxonomy"]

= Just place this shortcode any where you want to display taxonomy list =

= shortcode attributes =

	- name = taxonomy name
	- hide_empty = show/hide empty category/term
	- include = show only specific terms
	- exclude = skip category/term by term id
	- order = option to set display order
	- search_bar = search field to filter terms list

= example shortcode =

	- [taxonomy_list name="taxonomy" hide_empty="false" exclude="11,12,13" order="ASC" search_bar=1]
	
== Installation ==
To add a WordPress Plugin using the built-in plugin installer:

Go to Plugins > Add New.

1. Type in the name \"Taxonomy List\" in Search Plugins box
2. Find the \"Taxonomy List\" Plugin you wish to install.
3. Click Install Now to install the WordPress Plugin.
4. The resulting installation screen will list the installation as successful or note any problems during the install.
If successful, click Activate Plugin to activate it, or Return to Plugin Installer for further actions.

== Frequently Asked Questions ==
= How to use this plugin? =
Just after installing Taxonomy List, You can use any of the provided shortcodes by Taxonomy List

== Screenshots ==

1. Taxonomy Shortcode Result.
1. Taxonomy List Preview.

== Changelog ==

= 1.0.2 =
- Improvement | Search filter results

= 1.0.1 =
- Tested upto WordPress 5.0.3
- New Feature | Added search bar functionality to filter specific term from the taxonomy list.
- Improvement | Remove FontAwesome external Library to reduce load time.

= 1.0.0 =
- Initial release.

== Upgrade Notice ==
Always try to keep your plugin update so that you can get the improved and additional features added to this plugin till the moment.