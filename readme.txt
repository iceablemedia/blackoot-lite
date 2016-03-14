Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
Changelog


== ABOUT BLACKOOT LITE ==

Blackoot Lite is an elegant, responsive, multi-purpose theme for WordPress. Perfect for photography, or music oriented blogs as well as portfolio and creative business websites.
It features two widgetizable areas in the sidebar and the optional footer, two custom menu locations in the navbar and footer, optional tagline display, custom logo and favicon, custom header image and custom background.

Blackoot Lite is the lite version of Blackoot Pro, which comes with many additional features and access to premium class pro support forum and can be found at http://www.iceablethemes.com

== GETTING STARTED ==

* Once you activate the theme from your WordPress admin panel, you can visit the "Theme Options" page to quickly and easily upload your own logo and optionally set a custom favicon.
* If you will be using a custom header image, you can also optionally choose to enable or disable it on your homepage, blog index pages, single post pages and individual pages.
* It is highly recommended to set a menu (in appearance > menu) instead of relying on the default fallback menu. Doing so will automatically activate the dropdown version of your menu in responsive mode.
* You can also set a custom menu to appear at the bottom right of your site. Note this footer menu doesn't support sub-menus, only top-level menu items will be displayed.

Additional documentation and free support forums can be found at http://www.iceablethemes.com under "support".

== SPECIAL FEATURES INSTRUCTIONS ==

* Footer widgets: The widgetizable footer is disabled by default. To activate it, simply go to Appearance > Widgets and drop some widgets in the "Footer" area, just like you would do for the sidebar. It is recommended to use 4 widgets in the footer, or no widgets at all to disable it.

Additional documentation and free support forums can be found at http://www.iceablethemes.com under "support".

== LICENSE ==

This theme is released under the terms of the GNU GPLv2 License.
Please refer to license.txt for more information.

== CREDITS ==

This theme bundles some third party javascript and jQuery plugins, released under GPL or GPL compatible licenses:
* superfish: Copyright 2013 Joel Birch. Dual licensed under the MIT and GPL licenses. http://users.tpg.com.au/j_birch/plugins/superfish/
* HTML5 Shiv v3.6 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed. Source: https://github.com/aFarkas/html5shiv
* Font Awesome: Copyright Dave Gandy. http://fontawesome.io
	* Font License
		* Applies to all desktop and webfont files in the following directory: font-awesome/fonts/.
		* License: SIL OFL 1.1
		* URL: http://scripts.sil.org/OFL
	* Code License
		* Applies to all CSS and LESS files in the following directories: font-awesome/css/, font-awesome/less/, and font-awesome/scss/.
		* License: MIT License
		* URL: http://opensource.org/licenses/mit-license.html
	* Brand Icons
		* All brand icons are trademarks of their respective owners.
		* The use of these trademarks does not indicate endorsement of the trademark holder by Font Awesome, nor vice versa.

All other files are copyright 2014-2016 Iceable Media and released under the terms of the GNU GPLv2 License.

== TRANSLATIONS ==

Currently available translations:

* French (fr_FR) translation: by Iceable Themes
* Spanish (es_ES) translation (front-end): by David Ospina <dao_star_2@hotmail.com> (http://interlunas.vzpla.net/)

Translating this theme into you own language is quick and easy, you will find a .POT file in the /languages folder to get you started. It contains about 80 strings only.
If you don't have a .po file editor yet, you can download Poedit from http://www.poedit.net/download.php - Poedit is free and available for Windows, Mac OS and Linux.

If you have translated this theme into your own language and are willing to share your translation with the community, please feel free to do so on the forums at http://www.iceablethemes.com
Your translation files will be added to the next update. Don't forget to leave your name, email address and/or website link so credits can be given to you!

== CHANGELOG ==

= 1.1.6 =
March 14th, 2016
* Updated user-contributed Spanish (es_ES) translation (now a full translation)

= 1.1.5 =
March 7th, 2016
* Added user-contributed Spanish (es_ES) translation

= 1.1.4 =
January 13th, 2016
* Enhanced support for <!--more--> quicktag
* Updated copyright to 2016
* Tested with WordPress 4.4.1

= 1.1.3 =
November 23rd, 2015
* Fixed issue with sidebar in WordPress 4.4
* Tested with WordPress 4.4 (beta 4)

= 1.1.2 =
November 4th, 2015
* Fixed footer menu alignment
* Disabled the "favicon" theme setting for WordPress 4.3+ (no longer useful since WP 4.3+ includes wp_site_icon)
* Enhanced screen-reader-text CSS support, based on a post by Joe Dolson on make.wordpress.org
* Changed textdomain to theme slug: 'blackoot-lite'

= 1.1.1 =
August 31th, 2015
* Added screen-reader-text CSS support
* Enqueue "Open Sans" webfont for non-logged in users
* Tested with WordPress 4.3

= 1.1.0 =
July 22th, 2015
* Replaced theme options panel with Customizer implementation
* Added "title-tag" support
* Updated fr_FR translation file
* Tested with WordPress 4.2.2

= 1.0.6 =
February 9th, 2015
* Fixed a small glitch in footer.php (extra php tag that caused a php syntax error)

= 1.0.5 =
February 6th, 2015
* Removed analytics tagging on external links in Theme Options
* Removed obsolete code in comments.php

= 1.0.4 =
February 2nd, 2015
* Fixed: made all text strings translatable in front-end and back-end.
* Updated POT file
* Updated fr_FR translation
* Updated copyright date to 2015

= 1.0.3 =
October 29th, 2014
* Appropriately use the_title_attribute() where applicable in blackoot_breadcrumbs(), index.php and single.php
* Added an extra user permission check before saving theme options setting in the database

= 1.0.2 =
October 23th, 2014
* Updated credits and license statement for more clarity
* Appropriately prefixed 'blackoot-style' handle when registering style.css
* Moved admin notice to theme option page only and removed blackoot_notice_ignore()
* Now using core bundled version of hoverIntent
* Now bundling Font Awesome
* Removed content filters
* Renamed and moved /page-full-width.php to /page-templates/full-width.php
* Renamed /page-title.php to /part-title.php
* Reviewed blackoot_breadcrumbs() and added escaping of output
* Reviewed and enhanced validation, sanitation and escaping in theme options

= 1.0.1 =
September 10th, 2014
* Fixed Theme URI
* Fixed Screenshot

= 1.0.0 =
September 10th, 2014
* Initial release
