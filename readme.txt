=== XKCD Embedder ===
Contributors: section214
Tags: xkcd, comic, webcomic, widget, shortcode
Requires at least: 3.0
Tested up to: 4.2.3
Stable tag: 1.0.0

A simple plugin to display XKCD comics on your website.

== Description ==

Simple plugin that allows you to display an XKCD comic through the use of a shortcode or a widget. The widget contains options for using the XKCD comic as the widget title, showing the latest strip, a random comic, or a comic of your choosing. Currently (and will continue to) piggybacks off XKCD's JSON interface. Spec: https://xkcd.com/json.html

The shortcode also allows you to show a random comic, the latest comic, or a comic of your choosing and gives you the option to display the comic's title in the content area that the shortcode is bine used, along with the comic transcript for those concerned with accessibility (the widget does this by default). 
To use the shortcode, simply use this bit of text [xkcd comic='345' display_title='false' display_transcript='false' ] and customize. 

For example, to get a random comic, with the title displaying and a transcript for people with screenreaders you would use [xkcd comic='random' display_title='true' display_transcript='true' ]

== Installation ==

1. Unzip the downloaded 'xkcd-embed.zip' file
2. Upload the 'xkcd-embed' folder to '/wp-content/plugins' directory of your WordPress installation
3. Activate the plugin via the WordPress Plugins page

== Frequently Asked Questions ==

Still waiting!

== Changelog ==

= Version 1.0.0 =
* Initial release