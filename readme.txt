=== Plugin Name ===
Contributors: johnkolbert
Donate link: http://www.johnkolbert.com/portfolio/wp-plugins/codebox
Tags: development, php, testing
Requires at least: 2.7
Tested up to: 2.9.2
Stable tag: 1.1

Gives WordPress developers an easy way to test their functions and code in a live WordPress environment.

== Description ==

The Developer's CodeBox is a WordPress plugin for developers! It adds a textarea that allows you to try out HTML, PHP, or Javascript code. It is integrated with the Easy Area syntax highlighting for extra usefulness! This is great for trying out code snippets before integrating them with your larger project or plugin. It supports native PHP using proper syntax (eg: <?php  ?>), and best of all: it supports native WordPress functions like get_bloginfo('template_url');

Why did I make this plugin? Often when writing a new plugin I want to test a particular function or code snippet and see if it works properly. Usually I want to test it isolated from other code so I can hone in specifically on any errors or irregularities quickly. This typically meant that I would copy the function, paste it into a blank plugin, add the necessary actions or filters so I could visualize its results in the admin area, activate it, then test it.

Well, I got tired of doing all that. Enter the Developer's CodeBox. 

Please note: the Developer's CodeBox is NOT a sandbox. Meaning code run in the CodeBox has the ability to do whatever it is you're testing. If you are testing a function to add a column to your mySQL database, it will actually be added! That said, I recommend only using this plugin on a development server were testing code won't do any damage. You've been warned!

This plugin uses the syntax highlighting script found here: http://www.cdolivet.com/index.php?page=editArea

== Installation ==

Simply upload to your wp-content/plugins folder and activate from the plugins menu. Nothing else to it!

== Frequently Asked Questions ==

None yet

== Screenshots ==
1. The main editing page
2. You can test your HTML, PHP, or Javascript code and view it with out reloading the page

== Changelog ==

= 1.1 =
* Fixes plugin content URL error

= 1.0 =
* Initial stable release



