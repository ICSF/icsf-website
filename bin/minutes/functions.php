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

	function process($content)
	{
		$search  = array('/^ACT:(.+)$/', '/^MOT<(.+)>:(.+)$/');
		$replace = array('<span class="action">$1</span>', '<span class="motion $1">$2</span>');
		$count   = 0;
		$content = preg_replace($search, $replace, $content, -1, $count);

		if ($count > 0)
		{
			global $actions;
			$actions [] = $content;
		}
		return $content;
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
		global $need_reopen;

		if (!$need_reopen)
			while (count($levels) > 0)
				close_level();

		$levels = array();

		$need_reopen = false;

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
				while (count($levels) > $lvl + 1)
					close_level();
				echo '</li>';
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

		$text = process(trim($line['content']));
		echo PHP_EOL . tabs(3 + $lvl) . '<li>' . $text;
		$levels[$lvl] = $text;
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

		if (!$need_reopen)
			for ($i = 0; $i < count($levels); ++$i)
				close_level(false,$i);

		echo PHP_EOL . tabs(2) . '<p class="exit">' . trim($line['content']) . '</p>';
		$need_reopen = true;
	}

	function handle_entrance($line)
	{
		global $levels;
		global $need_reopen;

		if (!$need_reopen)
			for ($i = 0; $i < count($levels); ++$i)
				close_level(false,$i);

		echo PHP_EOL . tabs(2) . '<p class="entrance">' . trim($line['content']) . '</p>';
		$need_reopen = true;
	}

	function print_actions($actions)
	{
		echo PHP_EOL, tabs(2), '<a onclick="window.location.hash = (window.location.hash == \'#actions\' ? \'\' : \'#actions\')" id="actions"><h3>Motions &amp; Actions</h3><ul>', PHP_EOL;
		foreach ($actions as $action)
		{
			echo tabs(3), '<li>', $action, '</li>', PHP_EOL;
		}
		echo tabs(2), '</ul></a>', PHP_EOL;
	}
