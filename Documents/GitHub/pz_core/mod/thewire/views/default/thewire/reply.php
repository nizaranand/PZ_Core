<?php
/**
 * Reply header
 */

$post = $vars['post'];
$poster = $post->getOwnerEntity();
$post_owner = get_entity(get_input('parent_guid'));
			$poster->access_id = $access_id;
$poster_details = array(
	htmlentities($poster->name,  ENT_QUOTES, 'UTF-8'),
	htmlentities($poster->username,  ENT_QUOTES, 'UTF-8'),
);
?>
<b><?php echo elgg_echo('thewire:replying', $poster_details); ?>: </b>
<?php echo $post->description;