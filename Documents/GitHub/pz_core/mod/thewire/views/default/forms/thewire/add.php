<?php
/**
 * Wire add form body
 *
 * @uses $vars['post']
 */

elgg_load_js('elgg.thewire');

$post = elgg_extract('post', $vars);
$access_id = elgg_extract('access_id', $vars, ACCESS_DEFAULT);
$text = elgg_echo('post');
if ($post) {
	$text = elgg_echo('thewire:reply');
}

if ($post) {
	echo elgg_view('input/hidden', array(
		'name' => 'parent_guid',
		'value' => $post->guid,
	));
}

echo elgg_view('input/plaintext', array(
	'name' => 'body',
	'class' => 'mtm',
	'id' => 'thewire-textarea',
));
?>
<div id="thewire-characters-remaining">
	<span>1000</span> <?php echo elgg_echo('thewire:charleft'); ?>
</div>
<div class="elgg-foot mts">
<?php

echo elgg_view('input/submit', array(
	'value' => $text,
	'id' => 'thewire-submit-button',
));
?>
<div>
WARNING: Our site is in beta, so there is a glitch! when replying to someone the access level gets set back to friends, despite what you started it as. Change the access in your replies if you don't want all friends seeing what you are saying! <br/>  we are working on fixing this! You can <a href="https://github.com/planetzuda/PZ_Core/tree/PZ_Core/Documents/GitHub/pz_core/mod"> help out</a> since this part of the site is open source.  
	<label><?php echo elgg_echo('access'); ?></label><br />
	<?php echo elgg_view('input/access', array('name' => 'access_id', 'value' => $access_id)); 

?>
</div>