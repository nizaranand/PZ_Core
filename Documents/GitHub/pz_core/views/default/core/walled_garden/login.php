<?php
/**
 * Walled garden login
 */

$title = elgg_get_site_entity()->name;
$welcome = elgg_echo('walled_garden:welcome');
$welcome .= ': <br/>' . $title . ' beta';
$link ='<p> Read' . '<a href="http://planetzuda.com/news/"> Planet Zuda News</a>' . '<br/>' . 'Or listen to the' . '<a href="http://planetzuda.com/news/podcasts/"> weekly podcast</a></p>';  
$menu = elgg_view_menu('walled_garden', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-general elgg-menu-hz',
));

$login_box = elgg_view('core/account/login_box', array('module' => 'walledgarden-login'));

echo <<<HTML

<div class="elgg-col elgg-col-1of2">
	<div class="elgg-inner">
	$link
		<h1 class="elgg-heading-walledgarden">
			$welcome
			
		</h1>
		$menu
	</div>
</div>
<div class="elgg-col elgg-col-1of2">
	<div class="elgg-inner">
		$login_box
	</div>
</div>
HTML;
