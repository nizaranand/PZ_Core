<?php
/**
 * User wire widget edit view
 */

// set default value
if (!isset($vars['entity']->num_display)) {
	$vars['entity']->num_display = 5;
}

$params = array(
	'name' => 'params[num_display]',
	'value' => $vars['entity']->num_display,
	'options' => array(2, 5, 10, 15, 20, 25, 30, 35, 40, 45,50),
);
$dropdown = elgg_view('input/dropdown', $params);

?>
<div>
	<?php echo elgg_echo('thewire:num'); ?>:
	<?php echo $dropdown; ?>
</div>
