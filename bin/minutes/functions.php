<?php

	$levels = array();
	$need_reopen = false;

	function tabs($num)
	{
		return str_repeat("\t", $num);
	}

	function people($title, $people)
	{
		echo tabs(2) . '<h3>' . $title . '</h3>' . PHP_EOL;
		echo tabs(2) . '<div class="peoples">';

		$people=explode(',', $people);

		foreach ($people as $person)
			echo trim($person).PHP_EOL;
		echo '</div>' . PHP_EOL;
	}

	function close_level($forget=true, $unindent =0)
	{
		global $levels;
		echo '</li>' . PHP_EOL . tabs(1 + count($levels)-$unindent) . '</ul>';
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
			echo PHP_EOL . tabs(2 + $i) . '<ul>';
			echo PHP_EOL . tabs(3 + $i) . '<li class="continued">' . $levels[$i];
		}

		array_splice($levels, $level);
		$need_reopen = false;
	}

	function handle_header($line)
	{
		global $levels;
		while (count($levels) > 0)
			close_level();

		preg_match('/(=*)(.+)/', $line['content'], $contents);
		$h_level = 3 + strlen($contents[1]);

		echo PHP_EOL . PHP_EOL . tabs(2) . '<h' . $h_level .
			' class="count">' . trim($contents[2]) . '</h' . $h_level . '>';
	}

	function handle_bullet($line)
	{
		global $levels;
		$lvl = strlen($line['ws']);
		reopen($lvl);

		if ($lvl == count($levels) - 1)
		{
			echo '</li>';
		}
		else
		{
			if ($lvl < count($levels))
			{	
				while (count($levels) > $lvl)
					close_level();
			}
			else
			{
				if ($lvl > count($levels))
				{
					err('Level requested (' . $lvl . 
					') is too deep for containing level ' . count($levels) - 1);
					$lvl = count($levels);
				}
				echo PHP_EOL . tabs(2 + $lvl) . '<ul>';
			}
		}

		echo PHP_EOL . tabs(3 + $lvl) . '<li>' . trim($line['content']);
		$levels[$lvl] = trim($line['content']);
	}

	function handle_cont($line)
	{
		global $levels;
		reopen(count($levels) - 3);
		echo PHP_EOL . tabs(3 + count($levels)) . trim($line['content']);
	}

	function handle_exit($line)
	{
		global $levels;
		global $need_reopen;

		for ($i = 0; $i < count($levels); ++$i)
			close_level(false,$i);

		echo PHP_EOL . tabs(2) . '<p class="exit">' . trim($line['content']) . '</p>';
		$need_reopen = true;
	}

	function handle_entrance($line)
	{
		global $levels;
		global $need_reopen;

		for ($i = 0; $i < count($levels); ++$i)
			close_level(false,$i);

		echo PHP_EOL . tabs(2) . '<p class="entrance">' . trim($line['content']) . '</p>';
		$need_reopen = true;
	}

