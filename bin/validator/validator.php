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

foreach ($result as $err)
{
	echo
		($err->warning ? '[WARN]' : '[ERR!]'), ' ',
		$err->file, ':', $err->line, ' - ',
		$err->message, PHP_EOL;
}
	echo $result->countErrors(), ' Errors, ',
		$result->countWarnings(),' Warnings.', PHP_EOL;

if (count($result) === 0)
	exit(0);
else
	exit(1);
