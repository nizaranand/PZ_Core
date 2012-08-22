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
gatekeeper();
$guid = get_input('invite_guid',0);
	if ($entity = get_entity($guid)) {
		if ($entity->canEdit()) {
			if ($entity->delete()) {
				system_message(elgg_echo("galliinvite:delete:success"));
			} else {
				register_error(elgg_echo("galliinvite:delete:failed"));
			}
		}
	}		
forward($_SERVER['HTTP_REFERER']);
?>