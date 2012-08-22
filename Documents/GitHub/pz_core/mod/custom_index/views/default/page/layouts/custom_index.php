<?php
/**
 * Elgg custom index layout
 * 
 * You can edit the layout of this page with your own layout and style. 
 * Whatever you put in this view will appear on the front page of your site.
 * 
 */


?>

<div class="custom-index elgg-main elgg-grid clearfix">
	<div class="elgg-col elgg-col-1of2">
    
		<div class="elgg-inner pvm prl">
<?php
// left column

// Top box for login or welcome message
if (elgg_is_logged_in()) {
	forward('dashboard');
} else {
	$top_box = $vars['login'];
}

?>
		</div>
	</div>
<!--<div class="elgg-col elgg-col-1of2">
		<div class="elgg-inner pvm"> !--> 
<?php
// right column

// a view for plugins to extend
echo elgg_view("index/righthandside");

// files

?>
		</div>
	</div>
</div>
