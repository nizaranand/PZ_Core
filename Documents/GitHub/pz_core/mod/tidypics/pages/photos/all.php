<?php
forward('photos/friends/');
/**
 * View all albums on the site
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2

elgg_push_breadcrumb(elgg_echo('photos'));

$num_albums = 16;

$offset = (int)get_input('offset', 0);
$content = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'album',
	'limit' => $num_albums,
	'full_view' => false,
	'list_type' => 'gallery',
	'list_type_toggle' => false,
	'gallery_class' => 'tidypics-gallery',
));
if (!$content) {
	$content = elgg_echo('tidypics:none');
}

$title = elgg_echo('album:all');

elgg_register_title_button('photos');

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('tidypics/sidebar', array('page' => 'all')),
));

echo elgg_view_page($title, $body);
 */
elgg_push_breadcrumb($owner->name, "photos/friends/$owner->username");
elgg_push_breadcrumb(elgg_echo('friends'));

$title = elgg_echo('album:friends');


$num_albums = 16;

set_input('list_type', 'gallery');
$content = list_user_friends_objects($owner->guid, 'album', $num_albums, false);
if (!$content) {
	$content = elgg_echo('tidypics:none');
}

elgg_register_title_button();

$body = elgg_view_layout('content', array(
	'filter_context' => 'friends',
	'content' => $content,
	'title' => $title,
));

echo elgg_view_page($title, $body);