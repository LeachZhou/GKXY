<?php

if (! defined('AWS_PATH'))
{
	define('AWS_PATH', dirname(__FILE__) . '/');
}

require_once (AWS_PATH . 'init.php');

if (defined('G_GZIP_COMPRESS') AND G_GZIP_COMPRESS === TRUE)
{
	if (@ini_get('zlib.output_compression') == FALSE)
	{
		if (extension_loaded('zlib'))
		{
			if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) AND strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
			{
				ob_start('ob_gzhandler');
			}
		}
	}
}

require_once (AWS_PATH . 'aws_app.inc.php');
require_once (AWS_PATH . 'aws_controller.inc.php');
require_once (AWS_PATH . 'aws_model.inc.php');