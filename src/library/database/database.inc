<?php

	ini_set("mysql.trace_mode", "0");

	class Database
	{
		public static $conn;

		public static function getItemTypes()
		{
			$result = self::$conn->query('SELECT TypeKey AS id, types.Type AS name, COUNT(*) AS count FROM items NATURAL JOIN types WHERE Retired = 0 GROUP BY TypeKey');
			$types = array();
			while ($type = $result->fetch_object())
			{
				$type->id = (int)$type->id;
				$types[$type->id] = $type;
			}

			return $types;
		}

		/**
		 * Perform a search of the database
		 *
		 * Search conditions are set via $conditions
		 * The resulting array is put into &$results
		 * The function returns the _total_ number of matches for the search
		 * (including those before offset and after offset+limit
		 */
		static function search(SearchConditions $conditions, &$results)
		{
			$query = 'SELECT SQL_CALC_FOUND_ROWS
			items.ItemKey as id, items.Title, items.Series, items.SeriesNum,
			authors.Author, items.TypeKey, items.AcquireDate
			FROM items JOIN authors USING (AuthorKey) WHERE (%s)
			ORDER BY TypeKey, Author, Series, SeriesNum, Title LIMIT %d, %d';

			$filters = array('Retired = 0');

			if (!empty($conditions->title))
				$filters []= static::makeFilter('items.Title', $conditions->title);
			if (!empty($conditions->author))
				$filters []= static::makeFilter('authors.Author', $conditions->author);
			if (!empty($conditions->series))
				$filters []= static::makeFilter('items.Series', $conditions->series);

			if (empty($filters))
				$filters = 'true';
			else
				$filters = implode(') AND (', $filters);

			$query = sprintf($query, $filters, $conditions->offset, $conditions->limit);
			$data = self::$conn->query($query);

			$results = array();
			while ($item = $data->fetch_object())
				$results[] = $item;

			$count = self::$conn->query('SELECT FOUND_ROWS()');
			$count = $count->fetch_assoc();
			$count = (int)current($count);

			return $count;
		}

		static function latest($page = 1)
		{
			$data = self::$conn->query('SELECT items.ItemKey as id, items.Title, items.Series, items.SeriesNum, authors.Author, items.TypeKey, items.AcquireDate FROM items JOIN authors USING (AuthorKey) WHERE Retired = 0 ORDER BY AcquireDate DESC LIMIT ' . ((int)$page - 1)*50 . ', 50');
			$results = array();
			while ($item = $data->fetch_object())
				$results[] = $item;

			return $results;
		}

		static function makeFilter($field, $str)
		{
			$str = explode(' ', $str);
			$str = array_map(function ($s) use ($field) { return sprintf('%s LIKE "%%%s%%"', $field, $s); }, $str);
			return implode(' OR ', $str);
		}
	}
	Database::$conn = new Mysqli('p:icsflibsrv.su.ic.ac.uk', 'api', 'QuarteredLancerBot', 'library');

	class Item
	{
		public $id = 0;
		public $Title = '';
		public $Author = '';
		public $Series = '';
		public $SeriesNum = '';
		public $TypeKey = 0;
		public $AcquireDate = '';
	}

	class Type
	{
		const BOOK = 1;
		const GRAPHIC_NOVEL = 2;
		const DVD = 5;
	}

	class SearchConditions
	{
		public $title;
		public $author;
		public $series;

		public $limit = 50;
		public $offset = 0;
	}

