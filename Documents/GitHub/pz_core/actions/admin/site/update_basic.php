<?php
/**
 * Updates the basic settings for the primary site object.
 *
 * Basic site settings are saved as metadata on the site object,
 * with the exception of the default language, which is saved in
 * the config table.
 *
 * @package Elgg.Core
 * @subpackage Administration.Site
 */

if ($site = elgg_get_site_entity()) {
	if (!($site instanceof ElggSite)) {
		throw new InstallationException(elgg_echo('InvalidParameterException:NonElggSite'));
	}

	$site->description = (string) get_input('sitedescription');
	$site->name = (string) get_input('sitename');
	$site->email = (string) get_input('siteemail');
	$site->save();

	set_config('language', get_input('language'), $site->getGUID());
}

system_message(elgg_echo('admin:configuration:success'));
forward(REFERER);