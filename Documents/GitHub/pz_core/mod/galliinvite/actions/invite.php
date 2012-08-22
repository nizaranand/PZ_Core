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
$emails = get_input('emails');
$emailmessage = get_input('emailmessage');
$emails = trim($emails);
if (strlen($emails) > 0) {
	$emails = preg_split('/\\s+/', $emails, -1, PREG_SPLIT_NO_EMPTY);
}
if (!is_array($emails) || count($emails) == 0) {
	register_error(elgg_echo('invitefriends:noemails'));
	forward(REFERER);
}
$error = FALSE;
$bad_emails = array();
$already_members = array();
$sent_total = 0;
foreach ($emails as $email) {
	$email = trim($email);
	if (empty($email)) {
		continue;
	}
	if (!is_email_address($email)) {
		$error = TRUE;
		$bad_emails[] = $email;
		continue;
	}
	if (get_user_by_email($email)) {
		$error = TRUE;
		$already_members[] = $email;
		continue;
	}
	if(send_galliinvitation($email, $emailmessage)){
		$sent_total++;
	} else {
		$error = TRUE;
		continue;
	}	
}
if ($error) {
	register_error(elgg_echo('invitefriends:invitations_sent', array($sent_total)));
	if (count($bad_emails) > 0) {
		register_error(elgg_echo('invitefriends:email_error', array(implode(', ', $bad_emails))));
	}
	if (count($already_members) > 0) {
		register_error(elgg_echo('invitefriends:already_members', array(implode(', ', $already_members))));
	}
} else {
	system_message(elgg_echo('invitefriends:success'));
}
forward(REFERER);