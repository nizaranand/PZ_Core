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
$page_owner = elgg_get_page_owner_entity();
if (!$page_owner) {
	forward('galliinvite');
}
$title = elgg_echo('galliinvite:mine');
$offset = (int)get_input('offset', 0);
$invitations = galliinvite_userInvitations($page_owner->guid,10,$offset,false);
$count = galliinvite_userInvitations($page_owner->guid,0,0,true);
$body = elgg_view('galliinvite/invitations',array('invitations'=>$invitations, 'count'=>$count , 'offset' => $offset));
if (!$invitations) {
	$body = elgg_echo('galliinvite:none');
}
$params = array(
	'content' => $body,
	'title' => $title,
);
$body = elgg_view_layout('one_sidebar', $params);
echo elgg_view_page($title, $body);