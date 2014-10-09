<?php

elgg_register_event_handler('init', 'system', 'customsize_groupimage_init');

function customsize_groupimage_init() {
	elgg_register_plugin_hook_handler('entity:icon:url', 'group', 'customsize_groupimage_hook', 900);

	// Unregister default Elgg core groupicon handler
	elgg_unregister_page_handler('groupicon');
	// and then register our own
	elgg_register_page_handler('groupicon', 'customsize_groups_icon_handler');
}

function customsize_groupimage_hook($hook, $entity_type, $returnvalue, $params) {

	if (($hook != 'entity:icon:url') || (($hook == 'entity:icon:url') && ($params['size'] != 'large'))) {
		return;
	}

	if ($params['entity'] instanceof ElggGroup) {
		$entity = $params['entity'];
		$entity_guid = $entity->guid;
		$entity_icontime = $entity->icontime;
		$return = "groupicon/{$entity_guid}/master/{$entity_icontime}.jpg";
		return $return;
	} else {
		return $returnvalue;
	}
}

function customsize_groups_icon_handler($page) {

	// The username should be the file we're getting
	if (isset($page[0])) {
		set_input('group_guid', $page[0]);
	}
	if (isset($page[1])) {
		set_input('size', $page[1]);
	}
	// Include the standard profile index
	$plugin_dir = elgg_get_plugins_path();
	include("$plugin_dir/customsize_groupimage/icon.php");
	return true;
}