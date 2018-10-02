Customsize Groupimage for Elgg 2.3 and newer Elgg 2.X
=====================================================

Latest Version: 2.3.4  
Released: 2018-09-02  
Contact: iionly@gmx.de  
License: GNU General Public License version 2  
Copyright: (c) iionly 2014


Description
-----------

This plugin overrides the display of the master or large sized group profile images by displaying the group profile image in the original size of the uploaded image for these sizes.

For group profile pages it replaces the "large"-sized version of the group image icon with the master sized image by registering the "customsize_groupimage_hook" callback function for the 'entity:icon:url', 'group' plugin hook. This results in the "large"-sized group icon image to get replaced by the master image whereever the large size is requested. Secondly, for the master image size the original image is served instead by replacing the default Elgg 'groupicon' pagehandler with a custom page handler and the "customsize_groupimage_set_icon_file" plugin hook callback resulting in the original image to be used instead both the large and master sized version.

If you don't want the "large" image to be replaced but only want the original image where you explicitly call for the "master" group icon, comment out the registering of the "customsize_groupimage_hook" plugin hook handler. If you don't want the master size image to be replaced by the original sized image then comment out the registering of the "customsize_groups_icon_handler" page handler and "customsize_groupimage_set_icon_file" plugin hook handler and also comment out the associated unregistering of the pagehandler and plugin hook handler originally registered by the bundled Groups plugin that are otherwise replaced by the Customsize Groupimage plugin.

Depending on your theme (if using any but the default Elgg theme), you might have to make some additional adjustments in the theme's CSS for the group profile pages to look "nice" with a larger version of the group image used.


Installation
------------

1. If you have a previous version of the Customsize Groupimage plugin installed, first remove the old customsize_groupimage plugin folder from your mod directory before copying/extracting the new version to your server,
2. Copy the customsize_groupimage plugin folder into the mod folder on your server,
3. Enable the plugin in the admin section of your site.
