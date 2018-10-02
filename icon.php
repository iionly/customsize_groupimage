<?php
/**
 * Icon display
 *
 * @package ElggGroups
 */

$guid = get_input('group_guid');
$size = get_input('size');
if (!isset($size) || $size === '') {
   $size = 'medium';
}

elgg_entity_gatekeeper($guid, 'group');

$group = get_entity($guid);

$icon = $group->getIcon($size);
$url = elgg_get_inline_url($icon, true);
if (!$url) {
	if ($size == 'master') {
		$url = elgg_get_simplecache_url("groups/defaultlarge.gif");
	} else {
		$url = elgg_get_simplecache_url("groups/default{$size}.gif");
	}
}

forward($url);
