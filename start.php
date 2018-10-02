<?php

elgg_register_event_handler('init', 'system', 'customsize_groupimage_init');

function customsize_groupimage_init() {
	elgg_register_plugin_hook_handler('entity:icon:url', 'group', 'customsize_groupimage_hook', 899);

	elgg_unregister_plugin_hook_handler('entity:icon:file', 'group', 'groups_set_icon_file');
	elgg_register_plugin_hook_handler('entity:icon:file', 'group', 'customsize_groupimage_set_icon_file');

	elgg_unregister_page_handler('groupicon');
	elgg_register_page_handler('groupicon', 'customsize_groups_icon_handler');
}

function customsize_groupimage_hook($hook, $entity_type, $returnvalue, $params) {
	if (($hook != 'entity:icon:url') || (($hook == 'entity:icon:url') && ($params['size'] != 'large'))) {
		return $returnvalue;
	}

	if ($params['entity'] instanceof ElggGroup) {
		$entity = $params['entity'];
		$entity_guid = $entity->guid;
		$entity_icontime = $entity->icontime;
		$return = "groupicon/{$entity_guid}/master/{$entity_icontime}.jpg";
		return $return;
	}

	return $returnvalue;
}

function customsize_groups_icon_handler($page) {
	$guid = array_shift($page);
	elgg_entity_gatekeeper($guid, 'group');

	$size = array_shift($page) ? : 'medium';

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
}

function customsize_groupimage_set_icon_file($hook, $type, $icon, $params) {
	$entity = elgg_extract('entity', $params);
	$size = elgg_extract('size', $params, 'medium');

	$icon->owner_guid = $entity->owner_guid;
	if ($size == 'master') {
		$icon->setFilename("groups/{$entity->guid}.jpg");
	} else {
		$icon->setFilename("groups/{$entity->guid}{$size}.jpg");
	}

	return $icon;
}
