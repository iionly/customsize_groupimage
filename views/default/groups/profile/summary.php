<?php
/**
 * Group profile summary
 *
 * Icon and profile fields
 *
 * @uses $vars['entity']
 *
 * Customized by Customsize Group Image plugin
 * Group image is displayed in master size (which has same size as original uploaded image
 * as long as this image was smaller than 10240px)
 * and groups profile fields are displayed below the group profile image
 */

$group = elgg_extract('entity', $vars);
if (!($group instanceof \ElggGroup)) {
	echo elgg_echo('groups:notfound');
	return;
}

// we don't force icons to be square so don't set width/height
$icon = elgg_format_element('div', [
	'class' => 'groups-profile-icon',
], elgg_view_entity_icon($group, 'master', [
	'href' => '',
	'width' => '',
	'height' => '',
]));

$body = elgg_format_element('div', [
	'class' => 'groups-profile-fields',
], elgg_view('groups/profile/fields', $vars));

echo elgg_view_image_block($icon, $body, ['class' => 'groups-profile']);
