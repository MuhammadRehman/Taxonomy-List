# Taxonomy List
This plugin help you to display any taxonomy terms by using shortcode. you can use the shortcode any where like in pages, post, widgets. You can filter the taxonomy terms by typing their related words in the search bar, you can enable/disabled search bar field from the shortcode attribute.

## Shortcode
JUST PLACE THIS SHORTCODE ANY WHERE YOU WANT TO DISPLAY TAXONOMY LIST
[taxonomy_list name="taxonomy"]

## Shortcode Attributes
* name = taxonomy name
* hide_empty = show/hide empty category/term
* include = show only specific terms
* exclude = skip category/term by term id
* order = option to set display order
* search_bar = search field to filter terms list

## Example Shortcode
* [taxonomy_list name="taxonomy" hide_empty="false" exclude="11,12,13" order="ASC" search_bar=1]