<?php

abstract class Validator
{
	private $file;
	/** @var Result */
	private $result;

	public function __construct($file)
	{
		if (!is_readable($file))
		{
			trigger_error($file . ' is not readable', E_USER_ERROR);
		}

		$this->file = $file;
		$this->result = new Result;
	}

	protected static function getContent($file)
	{
		return file_get_contents($file);
	}

	/**
	 * @return Result
	 */
	public function validate()
	{
		$this->run(self::getContent($this->file));
		return $this->result;
	}

	protected abstract function run($content);

	protected function error($line, $warning, $message)
	{
		$this->result->add(new Error($this->file, $line, $warning, $message));
	}
}

class Error
{
	public $file;
	public $line;
	public $message;
	public $warning;

	public function __construct($file, $line, $warning, $message)
	{
		$this->file = $file;
		$this->line = (int)$line;
		$this->warning = (bool)$warning;
		$this->message = $message;
	}
}

class Result implements Iterator, Countable
{
	/** @var array */
	protected $entries  = array();
	/** @var int */
	protected $errors   = 0;
	/** @var int */
	protected $warnings = 0;

	public function __construct()
	{
		// Nothing to see here. Move along, citizen!
	}

	public function add(Error $err)
	{
		$this->entries [] = $err;
		if ($err->warning)
		{
			++$this->warnings;
		}
		else
		{
			++$this->errors;
		}
	}

	public function merge(Result $other)
	{
		$this->errors   += $other->errors;
		$this->warnings += $other->warnings;
		$this->entries   = array_merge($this->entries, $other->entries);
	}

	public function current()
	{
		return current($this->entries);
	}

	public function key()
	{
		return key($this->entries);
	}

	public function next()
	{
		return next($this->entries);
	}

	public function rewind()
	{
		return reset($this->entries);
	}

	public function valid()
	{
		return false !== current($this->entries);
	}

	public function countErrors()
	{
		return $this->errors;
	}

	public function countWarnings()
	{
		return $this->warnings;
	}

	public function count()
	{
		return $this->errors + $this->warnings;
	}
}
