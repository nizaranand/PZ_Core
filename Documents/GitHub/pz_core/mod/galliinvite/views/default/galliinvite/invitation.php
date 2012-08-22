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
 $invitation = $vars['invitation'];
	if ($invitation){
		$email = "<label>".$invitation->email."</label>";
		$created = elgg_echo('galliinvite:timesent').": ". elgg_view_friendly_time($invitation->time_created);
		$delete = elgg_view('output/confirmlink', array(
			'confirm' => elgg_echo('galliinvite:confirm_delete'),
			'href' => $vars['url'] . "action/galliinvite/delete?invite_guid=$invitation->guid",
			'text' => elgg_echo('delete')
		));
		$invited_guest = get_user_by_email($invitation->email);
		if ($invited_guest){
			$status = elgg_echo('galliinvite:status:joined') . ' |';
		}else{
			$status = elgg_echo('galliinvite:status:pending') . ' |';
		}
}
?>	
	<div class="invite_field">
	<?php echo elgg_echo('galliinvite:name').$email; ?>
        <div class="invite_controls">
            <?php echo "$status  $delete"; ?>
        </div>
        <div class="inivite_details">
            <?php echo $created; ?>
        </div>
    </div>		