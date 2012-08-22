<?php
 /**
 *	Elgg - Sitecode plugin
 *	This plugin adds extra protection to user registration. Only users with a valid site code can register
 *	Author : Sarath C | Team Webgalli
 *	Team Webgalli | Elgg developers and consultants
 *	Mail : info@webgalli.com
 *	Web	: http://webgalli.com | http://plugingalaxy.com
 *	Skype : 'team.webgalli'
 *	@package Elgg-webgalli_sitecode
 *	Licence : GNU2
 *	Copyright : Team Webgalli 2011-2015
 */
	echo "<p>";
	echo elgg_echo('galliinvite:getlicence'); 
	echo elgg_view('input/text', array('name' => 'params[gallilicence]','value' => $vars['entity']->gallilicence));
	echo "</p>";
	echo "<p>";
	echo elgg_echo('galliinvite:registration'); 
	echo elgg_view('input/dropdown', array(
		'name' => 'params[invitation_only]',
		'options_values' => array(
			'no' => elgg_echo('option:no'),
			'yes' => elgg_echo('option:yes')
		),
		'value' => $vars['entity']->invitation_only,
		));
	echo "</p>";
	echo "<p>";
	echo elgg_echo('galliinvite:maxinvitation'); 
	echo elgg_view('input/text', array('name' => 'params[max_invite]','value' => $vars['entity']->max_invite));
	echo "</p>";
	echo "<p>";
	echo elgg_echo('galliinvite:allowvalidation'); 
	echo elgg_view('input/dropdown', array(
		'name' => 'params[allow_validation]',
		'options_values' => array(
			'no' => elgg_echo('option:no'),
			'yes' => elgg_echo('option:yes')
		),
		'value' => $vars['entity']->allow_validation,
		));
	echo "</p>";