=== Google FriendsConnect Members Gadget ===
Contributors: bthv, mbijon
Author URI: http://www.etchsoftware.com
Tags: Google, Friends, accounts, login, connect, OpenID, Friendconnect, Friendsconnect, Gadget
License: GPL2
Requires at least: 2.8
Tested up to: 3.2.1
Stable tag: 1.0.1


== Description ==

This creates a WordPress Widget for Google's 'Members Gadget' from their FriendConnect tools. Add to your site from the WordPress Widgets page.

For full FriendsConnect integration, check the Google Friend Connect Integration plugin: http://wordpress.org/extend/plugins/google-friend-connect-integration/

Minimum requirements:
* Wordpress **2.8** or more recent

Recommended:
* A sidebar that is at least 200px wide. The CSS can be set smaller, but formatting of Google's Gadget breaks at small sizes.


== Installation ==

This section describes how to install the widget and get it working.

1. Upload the folder and the files in it to the '/wp-content/plugins/' directory.
2. Activate the widget through the 'Appearance -> Widgets' menu in WordPress.
3. Enter your FriendConnect Site ID in the Widget config 'FriendsConnect ID' textbox.

**To get a FriendsConnect ID**
1. Register at http://www.google.com/friendconnect/
2. After signing up, click 'Plug-ins & APIs' > 'Rest API'
3. Look for a "Consumer Key" (example, *:01234567890) and copy the numbers that are after the "*:" part


== Frequently Asked Questions ==

= Is this a plugin? =
Yes, but the only thing it contains is a WordPress Widget. There is not a seperate configuration screen.

= Where do I find my Google FriendsConnect ID? =
1. Register at http://www.google.com/friendconnect/
2. After signing up, click 'Plug-ins & APIs' > 'Rest API'
3. Look for a "Consumer Key" (example, *:01234567890) and copy the numbers that are after the "*:" part


== Screenshots ==

1. Screenshot of the Gadget in the default sidebar. Using the Twenty Eleven theme and default colors


== Changelog ==

= Version 1.0.1 =
+ Added CSS width to be changed
+ Fixed border color setting (was locked on Google-default)
+ Updated instructions for finding FriendsConnect ID
+ Converted plugin files to UTF-8
+ Tested upto WordPress 3.2.1

= Version 1.0 =
+ Added Color Options
+ Added support for more rows.
+ Converted to multiwidget

= Version 0.2.5 =
+ Added several options

= Version 0.1 =
Initial Widget
