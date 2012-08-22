<?php
/**
 * All files
 *
 * @package ElggFile

elgg_push_breadcrumb(elgg_echo('file'));

elgg_register_title_button();

$limit = get_input("limit", 10);

$title = elgg_echo('file:all');

$content = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'file',
	'limit' => $limit,
	'full_view' => FALSE
));
if (!$content) {
	$content = elgg_echo('file:none');
}

$sidebar = file_get_type_cloud();
$sidebar = elgg_view('file/sidebar');

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);


elgg_push_breadcrumb(elgg_echo('file'), "file/all");
elgg_push_breadcrumb($owner->name, "file/owner/$owner->username");
elgg_push_breadcrumb(elgg_echo('friends'));

elgg_register_title_button();
*/

// this is a temporary fix. 
$title = elgg_echo("file:friends");

// offset is grabbed in list_user_friends_objects
$content = list_user_friends_objects($owner->guid, 'file', 10, false);
if (!$content) {
	$content = elgg_echo("file:none");
}

$sidebar = file_get_type_cloud($owner->guid, true);

$body = elgg_view_layout('content', array(
	'filter_context' => 'friends',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);