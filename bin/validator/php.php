<?php

class PhpValidator extends Validator
{
	protected static function getContent($file)
	{
		return `php  --syntax-check "$file"`;
	}

	protected function run($content)
	{
		$this->error(0, false, $content);
	}
}
