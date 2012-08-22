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
$invite_guid = get_input('invite_guid');
$form_body = elgg_view('input/hidden', array('name' => 'invite_guid', 'value' => $invite_guid));
echo $form_body;
?>