<?php
/**
 * Elgg secure invites
 * @package ElggInviteFriends
 * @author RaezMon @ Team Webgalli
 * @copyright Team Webgalli Ltd 2011-2015
 * @license commercial
 * @link http://webgalli.com/
 * Looking for Elgg support ? Visit us
 * @email : info@webgalli.com
 * @Skype : "team.webgalli"
 */
elgg_register_event_handler('init', 'system', 'galliinvite_init');
function galliinvite_init() {
	$base = elgg_get_plugins_path() . 'galliinvite';
	elgg_register_library('galliinvite:invitations', "$base/lib/galliinvite_invitations.php");
	elgg_load_library('galliinvite:invitations');

	elgg_unregister_page_handler('invite');
	elgg_register_page_handler('galliinvite', 'galliinvitefriends_page_handler');

	elgg_extend_view('css/elgg', 'galliinvite/css');	
	elgg_extend_view('register/extend', 'galliinvite/register', 500);

	elgg_register_action('invitefriends/invite', elgg_get_plugins_path() . 'galliinvite/actions/invite.php');	
	elgg_register_action('galliinvite/delete', elgg_get_plugins_path() . 'galliinvite/actions/delete.php');

	elgg_register_event_handler("create", "user", "galliinvite_register_event_hook");
	if (elgg_get_plugin_setting('invitation_only', 'galliinvite') == 'yes') {
		elgg_register_plugin_hook_handler('action', 'register', 'galliinvite_register_hook');
	}	

	elgg_unregister_menu_item('page', 'invite');
	if (elgg_is_logged_in()) {
		$invite = array(
			'name' => 'galliinvite',
			'text' => elgg_echo('friends:invite'),
			'href' => "galliinvite",
			'contexts' => array('friends'),
		);
		elgg_register_menu_item('page', $invite);
		$mine = array(
			'name' => 'galliinvite:mine',
			'text' => elgg_echo('galliinvite:mine'),
			'href' => "galliinvite/mine",
			'contexts' => array('friends'),
		);
		elgg_register_menu_item('page', $mine);
	}
	
}	
function galliinvitefriends_page_handler($page) {
	gatekeeper();
	$pages = dirname(__FILE__) . '/pages/galliinvite';
	elgg_set_context('friends');
	elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());
	switch ($page[0]) {
		case "invite":
		default:
			include "$pages/invite.php";
			break;
		case "mine":
			include "$pages/mine.php";
			break;
		return false;
	}
	return true;
}