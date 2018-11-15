<?php
/*
 * e107 Bootstrap CMS
 *
 * Copyright (C) 2008-2014 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)

 */
 
if (!defined('e107_INIT')) { exit; }

// v2.x Standard  - Simple mod-rewrite module. 

class privacypolicy_url // plugin-folder + '_url'
{
	function config() 
	{
		$config = array();
	
		$config['index'] = array(
			'regex'			=> '^privacy-policy/?$',
			'sef'			=> 'privacy-policy',
			'redirect'		=> '{e_PLUGIN}privacypolicy/privacypolicy.php?mode=pp',
		);

		$config['tos'] = array(
			'regex'			=> '^terms-of-service/?$',
			'sef'			=> 'terms-of-service',
			'redirect'		=> '{e_PLUGIN}privacypolicy/privacypolicy.php?mode=tos',
		);



		return $config;
	}
	
}