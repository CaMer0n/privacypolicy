<?php

if(!defined('e107_INIT'))
{
	require_once("../../class2.php");
}

if(!e107::isInstalled('privacypolicy'))
{
	header('location:'.e_HTTP.'index.php');
	exit;
}

require_once(HEADERF);

$conf = e107::pref('privacypolicy');

$contactURL = varset($conf['contactus'], e_HTTP.'contact.php');

$data = array(
	'SITEURL'   =>   SITEURL,
	'SITENAME'  =>   SITENAME,
	'DOMAIN'    =>   e_DOMAIN,
	'COMPANY'   =>   $conf['company'],
	'MODIFIED'  =>   e107::getParser()->toDate($conf['modified'],'long'),
	'CONTACTUS' =>   e_HTTP.$contactURL,
	'YEAR'      =>   date('Y')
);



$get = !empty($_GET['mode']) ? $_GET['mode'] : '';

	switch($get)
	{
		case "pp":
			$mode = 'privacy';
			break;

		case "tos":
			$mode = 'terms';
			break;

		default:
			$mode = '';
			// code to be executed if n is different from all labels;
	}


if(!empty($mode))
{
	$template = e107::getTemplate('privacypolicy', 'privacypolicy', $mode);


	if(!empty($template[e_LAN]['body']))
	{
		$text = e107::getParser()->simpleParse($template[e_LAN]['body'],$data);
		e107::getRender()->tablerender($template[e_LAN]['caption'], $text);
	}
}




require_once(FOOTERF);
exit;

?>