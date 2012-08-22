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
WARNING: Our site is currently in beta, so there is a glitch! If you don't set the access to anything besides friends your reply will go to all your friends. <br/> This will happen even if you started this convo at a different access level! You need to switch the access level back to the access level you were using.<br/> we are working on fixing this! You can <a href="https://github.com/planetzuda/PZ_Core/tree/PZ_Core/Documents/GitHub/pz_core/mod"> help out</a> since this part of the site is open source.  
	<label><?php echo elgg_echo('access'); ?></label><br />
	<?php echo elgg_view('input/access', array('name' => 'access_id', 'value' => $access_id)); 

?>
</div>