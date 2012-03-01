<?php

	$levels = array();
	$need_reopen = false;

	function tabs($num)
	{
		return str_repeat("\t", $num);
	}

	function people($title, $people)
	{
		echo tabs(2) . '\\subsection*{' . $title . '}' . PHP_EOL;
		echo tabs(2) . '\\begin{multicols}{2}\\begin{minitem}' . PHP_EOL;

		$people=explode(',', $people);

		foreach ($people as $person)
			echo tabs(3) . '\\item{' . latex_string($person) . '}' . PHP_EOL;
		echo '\\end{minitem}\\end{multicols}' . PHP_EOL;
	}

	function close_level($forget=true, $unindent =0)
	{
		global $levels;
		echo '}' . PHP_EOL . tabs(1 + count($levels)-$unindent) . '\\end{minitem}';
		if ($forget)
			unset($levels[count($levels)-1]);
	}

	function reopen($level)
	{
		global $levels;
		global $need_reopen;

		if (!$need_reopen)
			return;

		for ($i = 0; $i < $level; $i++)
		{
			echo PHP_EOL . tabs(2 + $i) . '\\begin{minitem}';
			echo PHP_EOL . tabs(3 + $i) . '\\item{' . $levels[$i];
		}

		array_splice($levels, $level);
		$need_reopen = false;
	}

	function handle_header($line)
	{
		global $levels;
		global $need_reopen;

		if (!$need_reopen)
			while (count($levels) > 0)
				close_level();

		$levels = array();

		$need_reopen = false;

		preg_match('/(=*)(.+)/', $line['content'], $contents);
		$h_level = strlen($contents[1]);


		echo PHP_EOL . PHP_EOL . tabs(2) . '\\' . str_repeat('sub', $h_level) .
			'section{' . latex_string($contents[2]) . '}';
	}

	function handle_bullet($line)
	{
		global $levels;
		$lvl = strlen($line['ws']);
		reopen($lvl);

		if ($lvl == count($levels) - 1)
		{
			echo '}';
		}
		else
		{
			if ($lvl < count($levels))
			{	
				while (count($levels) > $lvl + 1)
					close_level();
				echo '}';
			}
			else
			{
				if ($lvl > count($levels))
				{
					err('Level requested (' . $lvl . 
					') is too deep for containing level ' . count($levels) - 1);
					$lvl = count($levels);
				}
				echo PHP_EOL . tabs(2 + $lvl) . '\\begin{minitem}';
			}
		}

		echo PHP_EOL . tabs(3 + $lvl) . '\\item{' . latex_string($line['content']);
		$levels[$lvl] = latex_string($line['content']);
	}

	function handle_cont($line)
	{
		global $levels;
		reopen(count($levels) - 3);
		echo PHP_EOL . tabs(3 + count($levels)) . latex_string($line['content']);
	}

	function handle_exit($line)
	{
		global $levels;
		global $need_reopen;

		if (!$need_reopen)
			for ($i = 0; $i < count($levels); ++$i)
				close_level(false,$i);

		echo PHP_EOL . tabs(2) . '\\exit{' . latex_string($line['content']) . '}';
		$need_reopen = true;
	}

	function handle_entrance($line)
	{
		global $levels;
		global $need_reopen;

		if (!$need_reopen)
			for ($i = 0; $i < count($levels); ++$i)
				close_level(false,$i);

		echo PHP_EOL . tabs(2) . '\\entrance{' . latex_string($line['content']) . '}';
		$need_reopen = true;
	}

	function latex_string($text)
	{
		$escaped_text = str_replace(array('\\', '%', '&', '~'), array('\\\\', '\%', '\&', '$\sim$'), html_entity_decode(trim($text)));
		$escaped_text = preg_replace('/\'(.+)\'/', '`$1\'', $escaped_text);
		$escaped_text = preg_replace('/\"(.+)\"/', '``$1\'\'', $escaped_text);
		$escaped_text = preg_replace('/<em>(.+)<\/em>/', '\\textit{$1}', $escaped_text);
		return $escaped_text;
	}

