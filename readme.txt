=== WP Safer Cache ===
Contributors: futtta
Tags: wp super cache, w3 total cache, security, vulnerability, comments
Requires at least: 3.5
Tested up to: 3.6
Stable tag: 0.1.5

Small helper plugin to protect blogs with older versions of WP Super Cache and W3 Total Cache from unsane comments.

== Description ==

There was a vulnerability in WordPress installations that used WP Super Cache prior to version 1.3 or W3 Total Cache prior to version 0.9.2.9. This helper plugin was a stopgap solution for older versions. If you have upgraded WP Super Cache or W3 Total Cache, you can safely deactivate and remove this plugin.

I've posted a ["post mortem" of the vulnerability (reasons, fixes, timeline, ...) on my blog](http://blog.futtta.be/2013/04/18/wp-caching-plugin-vulnerability-debrief/).

I will request this plugin to be removed from the wordpress.org plugin repository before the end of April.

== Installation ==

Just install form your WordPress "Plugins|Add New" screen and all will be well. 

Manual installation is very straightforward:

1. Upload the zip-file and unzip it in the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= When do I need this helper plugin? =
Only if you are using WP Super Cache prior to version 1.3 (do upgrade to [the latest version](http://wordpress.org/extend/plugins/wp-super-cache/) which does not have this vulnerability!) or W3 Total Cache prior to version 0.9.2.9.

= Where can I find more info about the vulnerability? =
I [wrote a "post mortem"](http://blog.futtta.be/2013/04/18/wp-caching-plugin-vulnerability-debrief/) about the reasons, different fixes and the timeline of events of this security issue.

= I found a bug/ I would like a feature to be added! =
Use [the WP Safer Cache support forum at wordpress.org](http://wordpress.org/support/plugin/wp-safer-cache) or the [contact-page on my blog](http://blog.futtta.be/contact/).

== Changelog ==

= 0.1.5 =
* mark plugin as redundant

= 0.1.4 =
* W3 Total Cache version 0.9.2.9 fixes a.o. this security issue, do upgrade!

= 0.1.3 =
* copied some stuff from WP Super Cache fix (to filter comments already submitted)
* fix for HTML-comments starting in one comment and ending in the next one (as discovered by kisscsaby)

= 0.1.2 =
* fixed typo in regex (thx Donncha)
* declared WP Super Cache 1.3 as fixed (i.e. does not need this plugin)

= 0.1.1 =
* improved regex based on input from kisscsaby

= 0.1.0 =
* Initial version
