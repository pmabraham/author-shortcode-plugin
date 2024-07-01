# author-shortcode-plugin
A WordPress Plugin to display the author on one line with settings allows authors to include an avatar of a size of their choosing.

This WordPress plugin aims to allow bloggers and other content creators to have the author line all on one line, including the option to display the author avatar at the size of the administrator's choosing.  

Before developing this plugin, bloggers and content creators faced challenges displaying the 'authored by line' in a desired format.  The Gutenberg dynamic data point for pulling in the author had limitations. 

https://compassioncrossing.info/comprehensive-approaches-to-managing-hallucinations-in-dementia-patients/ is an example of how the author's information is displayed.

This plugin has a settings page under the WordPress settings area with the following selections:
-> Include Avatar => checkbox for yes or no
-> Avatar Size => Applies if "Include Avatar" is checked and defaults to 32 pixels
-> Open Link in New Tab => If checked, will open the author link in a new tab
-> Remove Settings on Uninstall => Clean up the associated database table data when the plugin is uninstalled.

Example usage within a post:

Example 1:
	By [author_info]

Example 2:
	Authored by [author_info]

File Plugin Structure

author-shortcode-plugin/

├── author-shortcode-plugin.php

├── settings.php

├── uninstall.php

├── block.js

├── readme.txt

Disclaimer:

This plugin is free and "as is."  The author of this plugin does not guarantee it will work on every WordPress site and is not responsible for any maintenance or any damages caused if this plugin does not work properly, as the author gives no guarantees or warranties.
