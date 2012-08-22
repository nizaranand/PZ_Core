<?php
/**
 * Walled garden body
 */
var news =  "<a href="https://planetzuda.com/news/"> Planet Zuda news </a>";
var podcast = "<a href="https://planetzuda.com/news/podcasts/"> PZ Tech Podcast </a>";
echo news;
echo podcast;
echo elgg_view('core/walled_garden/login');
echo elgg_view('core/walled_garden/lost_password');


if (elgg_get_config('allow_registration')) {
	echo elgg_view('core/walled_garden/register');
}
