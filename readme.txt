=== TinyCode ===
Contributors: cybio
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/tinycode/
Tags: shortcode, content, style, notice, important, inset, dropcap, quote, highlight
License: GPL v3, see LICENSE
Requires at least: 2.5
Tested up to: 2.8.4
Stable tag: 1.2.1

Some shortcodes to highlight parts of the text (notice, attention, infoboxes...). TinyCode processes your content and changes the pre-defined shortcodes (such as [important][/important]) to the correct, and pre-formatted HTML to highlight a part of the text. The component is compatible with WYSIWYG editors so you do not need to worry if you or your client, have little knowledge of HTML.

== Description ==

TinyCode processes your content and changes the pre-defined shortcodes
(such as [important][/important]) to the correct, and pre-formatted HTML to
highlight a part of the text. For ease of use, you can add the shortcodes with
just a few clicks using a popup at the WYSIWYG-Editor (new button).
The component is compatible with WYSIWYG editors, so you do not need to worry if
you or your client, have little knowledge of HTML.

For more information on how to use the shortcodes take a look at the [example page](http://blog.splash.de/plugins/tinycode-examples/).

Please report bugs and/or feature-request to our ticket-system: [Bugtracker/Wiki](http://trac.splash.de/tinycode).
For Support, please use the [forum](http://board.splash.de/forumdisplay.php?f=104).

The icons used in this plugin are from [famfamfam](http://famfamfam.com/lab/icons/silk/).

== Installation ==

1. Upload the 'tinycode' folder to '/wp-content/plugins/'
2. Activate the plugin through the 'Plugins' menu in the WordPress admin
3. Just use one of the shortcodes and enjoy the plugin ;)

== Frequently Asked Questions ==

= Which shortcodes are availible? =

- [dropcap]...some text...[dropcap]
To highlight the first letter of the text inside the shortcode.
- [inset lr="left"]...some content...[/inset]
To inset a part of the text.
- [blockquote]...[/blockquote]
To quote something.
- [important title="Sample Title"]...some content...[/important]
To generate nice style information boxes.
- [notice type="alert"]...some text...[/notice]
To show highlighted notices.

For other questions, take a look at the [support forum](http://board.splash.de/forumdisplay.php?f=104).

== Screenshots ==

1. WYSIWYG-Editor-Popup

2. notice styles

3. important styles

== Changelog ==

= 1.2.1 =
* [FIX] security (don't allow script execution outside wordpress)

= 1.2.0 =
* [FIX] WP <2.8 compatibility/enqueue cssfile
* [more information](http://blog.splash.de/2009/06/12/tinycode-1-2-0-wp_enqueue_style/)

= 1.1.2 =
* [FIX] Valid HTML-Code seems to be impossible with the autoformat of WordPress. (div is the better solution #2) (#5)

= 1.1.1 =
* [FIX] HTML-Validation error fixed (#2)
* [FIX] To many colors for quotes in the popup (#3)
* [more information](http://blog.splash.de/2009/04/26/tinycode-111-valides-htmlzuviele-farben/)

= 1.1.0 =
* [NEW] WYSIWYG-Editor-Popup to insert shortcodes with just a few mouse clicks (#1)
* [more information](http://blog.splash.de/2009/04/24/tinycode-110-popup-fur-den-editor/)

= 1.0.0 =
* initial release
* [more information](http://blog.splash.de/2009/04/20/tinycode-100-initial-release/)
