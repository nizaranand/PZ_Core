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
 $invitations = $vars['invitations'];
	$count = $vars['count'];
	if($count > 10){
		$offset = $vars['offset'];
		$pagination = elgg_view('navigation/pagination',array(
		'offset' => $offset,
		'count' => $count,
		'limit' => 10,
		));
		echo $pagination;
	}
	if ($invitations){
		foreach ($invitations as $invitation){
			echo elgg_view('galliinvite/invitation', array('invitation'=>$invitation));
		}
	}
?>	

		