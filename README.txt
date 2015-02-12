Customsize Groupimage for Elgg 1.9
Latest Version: 1.9.1
Released: 2015-02-12
Contact: iionly@gmx.de
License: GNU General Public License version 2
Copyright: (c) iionly 2014-2015


This plugin overrides the display of the master or large sized group profile images by displaying the group profile image in the original size of the uploaded image for these sizes.

For group profile pages it replaces the "large"-sized version of the group image icon with the master sized image by registering the "customsize_groupimage_hook" callback function for the 'entity:icon:url', 'group' plugin hook. This results in the "large"-sized group icon image to get replaced by the master image whereever the large size is requested. Secondly, for the master image size the original image is served instead by replacing the default Elgg 'groupicon' pagehandler with a custom page handler resulting in the original image to be used instead both the large and master sized version.

If you don't want the "large" image to be replaced but only want the original image where you explicitly call for the "master" group icon, comment out the registering of the "customsize_groupimage_hook" plugin hook. If you don't want the master size image to be replaced by the original sized image then comment out the registering of the 'customsize_groups_icon_handler'. I have to mention though that currently (Elgg 1.8.20 and Elgg 1.9.3 respectively) there's no master sized group image created. Therefore, if you would comment out the registering of the page handler and want the master image displayed, you would currently get the medium sized group image instead (default fallback size).

Depending on your theme (if using any but the default Elgg theme), you might have to make some additional adjustments in the theme's CSS for the group profile pages to look "nice" with a larger version of the group image used.



Installation:

1. Copy the customsize_groupimage plugin folder into the mod folder on your server,
2. Enable the plugin in the admin section of your site.


Changelog:

1.9.1
- Changed priority used for customsize_groupimage_hook plugin hook for the Customsize Groupimage plugin being compatible with the Identicon plugin.

1.9.0
- Version 1.8.0 updated for Elgg 1.9.

1.8.0
- Intial release for Elgg 1.8.
