<?php
/**
 * User wire post widget display view
 */
//elgg_load_js('elgg.thewire'); 
//echo elgg_view('forms/thewire/add');
 echo elgg_view_form('thewire/add');
/*
echo '<div>';
echo '<label>'; 
 echo elgg_echo('access');
echo '</label>' . '<br />'; 
echo elgg_view('input/access', array('name' => 'access_id', 'value' => $access_id)); 



echo '</div>' . '</div>';
*/
$isafriend = elgg_get_logged_in_user_entity()->getFriends("",20);	
$friends = $user->$isafriend;
$friends_guids = array();
foreach($friends as $friend){
  $friends_guids[] = $friend->guid;
}
$num = $vars['entity']->num_display;

$options = array(
	'type' => 'object',
	'subtype' => 'thewire',
	'container_guid' => $vars['entity']->$friends_guids,
	'limit' => $num,
	'full_view' => FALSE,
	'pagination' => FALSE,
);
$content = elgg_list_entities($options);

echo $content;

if ($content) {
	$owner_url = "thewire/owner/" . elgg_get_page_owner_entity()->username;
	$more_link = elgg_view('output/url', array(
		'href' => $owner_url,
		'text' => elgg_echo('thewire:moreposts'),
		'is_trusted' => true,
	));
	echo "<span class=\"elgg-widget-more\">$more_link</span>";
} else {
	echo elgg_echo('thewire:noposts');
}

?>
