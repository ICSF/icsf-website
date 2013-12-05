#!/usr/bin/php
<?php

require('core.php');
require('html.php');
require('php.php');

array_shift($argv);

$result = new Result;

foreach ($argv as $arg)
{
	if (!is_readable($arg))
	{
		$result->add(new Error($arg, 0, false, 'File does not exist or is not readable'));
		continue;
	}

	switch (pathinfo($arg, PATHINFO_EXTENSION))
	{
		case 'php':
			$validator = new PhpValidator($arg);
			break;
		case 'html':
			$validator = new HtmlValidator($arg);
			break;
		default:
			continue 2;
	}

	$inner = $validator->validate();
	$result->merge($inner);
}
