# Blackoot Lite

**Contributors:** iceable
**Requires at least:** WordPress 4.7
**Tested up to:** WordPress 5.1
**Stable tag:** 1.1.23
**Version:** 1.1.23
**Tested up to:** 5.5
**Requires PHP:** 5.6
**License:** GPLv2 or later
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html
**Tags:** one-column, two-columns, right-sidebar, custom-background, custom-header, custom-menu, footer-widgets, editor-style, featured-images, full-width-template, sticky-post, theme-options, threaded-comments, translation-ready, entertainment, photography, portfolio

An Elegant, Multi-purpose, Responsive WordPress Theme by Iceable Themes.


## Description

Blackoot Lite is an elegant, responsive, multi-purpose theme for WordPress. Perfect for photography, or music oriented blogs as well as portfolio and creative business websites.
It features two widgetizable areas in the sidebar and the optional footer, two custom menu locations in the navbar and footer, optional tagline display, custom logo and favicon, custom header image and custom background.

Blackoot Lite is the free version of Blackoot Pro, which comes with many additional features and access to premium class pro support forum and can be found at https://www.iceablethemes.com/shop/blackoot-pro/

### Getting started with Blackoot Lite

* Once you activate the theme from your WordPress admin panel, you can visit the customizer (Appearance > Customize) to set your own logo, header image, background, menus etc.
* If you will be using a custom header image, you will find options to enable or disable it on your homepage, blog index pages, single post pages and individual pages.
* It is highly recommended to set a menu yourself, instead of relying on the default menu. Doing so will automatically activate the dropdown version of your menu in responsive mode.
* You can also set a custom menu at the bottom right of your site. Note this footer menu doesn't support sub-menus, only top-level menu items will be displayed.
* Footer widgets: The widgetizable footer is disabled by default. To activate it, simply go to Appearance > Widgets and drop some widgets in the "Footer" area, just like you would do for the sidebar. It is recommended to use 4 widgets in the footer, or no widgets at all to disable it.
* Additional documentation and free support forums can be found at https://www.iceablethemes.com under "support".

### Translation

Bundled translations (GPL Licensed):
* French (fr_FR) translation: Copyright 2014-2020, Iceable Themes (https://www.iceablethemes.com)
* Spanish (es_ES) translation: Copyright 2016, David Ospina <dao_star_2@hotmail.com> (http://interlunas.vzpla.net/)

Translating this theme into your own language is quick and easy, you will find a .POT file in the /languages folder to get you started. It contains about 80 strings only.
If you don't have a .po file editor yet, you can download Poedit from https://www.poedit.net/download.php - Poedit is free and available for Windows, Mac OS and Linux.

If you have translated this theme into your own language and are willing to share your translation with the community, please feel free to do so on the forums at https://www.iceablethemes.com
Your translation files will be added to the next update. Don't forget to leave your name, email address and/or website link so credits can be given to you!


## Copyright

Blackoot Lite WordPress Theme, Copyright 2014-2019, Iceable Themes (https://www.iceablethemes.com)
Blackoot Lite is distributed under the terms of the GNU GPL

Blackoot Lite bundles the following third-party resources:

superfish, Copyright 2013 Joel Birch.
**License:** MIT and GPL
Source: http://users.tpg.com.au/j_birch/plugins/superfish/

HTML5 Shiv v3.6, Copyright @afarkas @jdalton @jon_neal @rem
**License:** MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

Font Awesome icons, Copyright Dave Gandy
**License:** SIL Open Font License, version 1.1.
Source: http://fontawesome.io/


## Changelog

### 1.1.22
February 28th, 2019
* Enhanced: Post titles in blog index are now h2 headings
* Updated copyright

### 1.1.21
January 31th, 2018
* Merged Google fonts requests into one
* Updated copyright

### 1.1.20
November 18th, 2017
* Updated Readme.txt file to the new format for WordPress.org
* Updated Tags list
* Tested with WordPress 4.9
* Removed support for WordPress lesser than 4.7

### 1.1.19
October 10th, 2017
* Refactored all PHP code to conform to the WordPress coding standards

### 1.1.18
August 25th, 2017
* Updated: Font-Awesome to version 4.7.0
* Fixed: Singular placeholder in gettext function in comments.php
* Fixed: PHP notice in breadcrumbs function
* Enhanced: Wrapped pingback url in appropriate conditionals in header.php
* Enhanced: HTML5Shiv is now properly enqueued
* Enhanced: Prefixed theme constants
* Enhanced: Prefixed variables names in part-title.php
* Enhanced: Using get_the_archive_title() for archive page titles
* Enhanced: Ordered placeholders for printf() in footer.php
* Enhanced: Removed additional support for child themes for WP<4.7 (was relying on file_exists() which emits a PHP E_WARNING upon failure, and using error silencing)

### 1.1.17
June 21th, 2017
* Removed function_exists('wp_site_icon') checks and related functions (deprecated since WP 4.3)

### 1.1.16
May 8th, 2017
* Added theme constants
* Load CSS and JS file with theme version to prevent potential issue after updates

### 1.1.15
March 8th, 2017
* Fixed blackoot_remove_rel_cat() to only remove "category" (but not "tag") value from the rel attribute
* Added php tags in footer.php, making it less confusing for users who want to modify the footer note

### 1.1.14
January 9th 2017
* Updated copyright to 2017

### 1.1.13
December 13th, 2016
* Fixed "read more" link with manually set excerpts

### 1.1.12
December 12th, 2016
* Now using get_theme_file_uri() to register stylesheets and javascripts for WordPress 4.7
* Now enqueuing 'Open Sans' whether user is logged in or not
* Tested with WordPress 4.7

### 1.1.11
November 14th, 2016
* Updated searchforms to HTML5 markup

### 1.1.10
September 21th, 2016
* Reviewed and enhanced structured data on blog index and single post entries

### 1.1.9
August 29th, 2016
* Removed function blackoot_render_title() used as a fallback for title tag support
* Dropped support for WordPress lesser than 4.1
* Tested with WordPress 4.6

### 1.1.8
June 16th, 2016
* Updated external links to wordpress.org and iceablethemes.com to https
* Removed php closing tags from end of files to prevent potential issues
* Updated theme tags for WordPress.org

### 1.1.7
May 18th, 2016
* Updated translation credit for full spanish translation
* Updated font-awesome to 4.6.3
* Tested with WordPress 4.5.2

### 1.1.6
March 14th, 2016
* Updated user-contributed Spanish (es_ES) translation (now a full translation)

### 1.1.5
March 7th, 2016
* Added user-contributed Spanish (es_ES) translation

### 1.1.4
January 13th, 2016
* Enhanced support for <!--more--> quicktag
* Updated copyright to 2016
* Tested with WordPress 4.4.1

### 1.1.3
November 23rd, 2015
* Fixed issue with sidebar in WordPress 4.4
* Tested with WordPress 4.4 (beta 4)

### 1.1.2
November 4th, 2015
* Fixed footer menu alignment
* Disabled the "favicon" theme setting for WordPress 4.3+ (no longer useful since WP 4.3+ includes wp_site_icon)
* Enhanced screen-reader-text CSS support, based on a post by Joe Dolson on make.wordpress.org
* Changed textdomain to theme slug: 'blackoot-lite'

### 1.1.1
August 31th, 2015
* Added screen-reader-text CSS support
* Enqueue "Open Sans" webfont for non-logged in users
* Tested with WordPress 4.3

### 1.1.0
July 22th, 2015
* Replaced theme options panel with Customizer implementation
* Added "title-tag" support
* Updated fr_FR translation file
* Tested with WordPress 4.2.2

### 1.0.6
February 9th, 2015
* Fixed a small glitch in footer.php (extra php tag that caused a php syntax error)

### 1.0.5
February 6th, 2015
* Removed analytics tagging on external links in Theme Options
* Removed obsolete code in comments.php

### 1.0.4
February 2nd, 2015
* Fixed: made all text strings translatable in front-end and back-end.
* Updated POT file
* Updated fr_FR translation
* Updated copyright date to 2015

### 1.0.3
October 29th, 2014
* Appropriately use the_title_attribute() where applicable in blackoot_breadcrumbs(), index.php and single.php
* Added an extra user permission check before saving theme options setting in the database

### 1.0.2
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

### 1.0.1
September 10th, 2014
* Fixed Theme URI
* Fixed Screenshot

### 1.0.0
September 10th, 2014
* Initial release
