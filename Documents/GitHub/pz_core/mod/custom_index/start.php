<?php
/**
 * Elgg demo custom index page plugin
 * 
 */

elgg_register_event_handler('init', 'system', 'custom_index_init');
elgg_register_plugin_hook_handler('route', 'activity', 'custom_index_activity');
// the plugin hook line calls the custom index activity function and tells it that activity doesn't exist.
elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'custom_index_public');


//elgg_unregister_menu_item('topbar', 'elgg_logo'); 
function custom_index_init() {

	// Extend system CSS with our own styles
	elgg_extend_view('css/elgg', 'custom_index/css');

	// Replace the default index page
	elgg_register_plugin_hook_handler('index', 'system', 'custom_index');
elgg_unregister_menu_item('topbar', 'elgg_logo'); 
elgg_unregister_menu_item('site','activity');
//elgg_unregister_menu_item('site','files');
	}
function custom_index_activity($hook, $type, $return, $params)
{
return false;
}
function custom_index_public($hook,$type,$return,$params)
{
$returnvalue[] = 'pages';
$returnvalue[] = 'pages/';
$returnvalue[] = 'actions/pages/delete';
$returnvalue[] = 'actions/pages/edit';

return $returnvalue;
}

function custom_index($hook, $type, $return, $params) {
	if ($return == true) {
		// another hook has already replaced the front page
		return $return;
	}

	if (!include_once(dirname(__FILE__) . "/index.php")) {
		return false;
	}

	// return true to signify that we have handled the front page
	return true;
}
