<?php
	class Database
	{
		public static $conn;

		public static function getItemTypes()
		{
			$result = self::$conn->query('SELECT TypeKey AS id, types.Type AS name, COUNT(*) AS count FROM items NATURAL JOIN types GROUP BY TypeKey');
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
		function search(SearchConditions $conditions, &$results)
		{
			$query = 'SELECT SQL_CALC_FOUND_ROWS 
			items.ItemKey as id, items.Title, items.Series, items.SeriesNum,
			authors.Name, items.TypeKey, item.AcquiredDate
			FROM items JOIN authors USING (AuthorKey) WHERE (%s)
			ORDER BY Type, Author, Series, SeriesNum, Title LIMIT %d, %d';
			
			$filters = array();
			
			if (isset($conditions->title))
				$filters []= static::makeFilter('item.Title', $conditions->title);
			if (isset($conditions->author))
				$filters []= static::makeFilter('author.Name', $conditions->author);
			if (isset($conditions->series))
				$filters []= static::makeFilter('item.Series', $conditions->series);

			if (empty($filters))
				$filters = 'true';
			else
				$filters = implode(') AND (', $filters);
			
			$query = sprintf($query, $filters, $conditions->offset, $conditions->limit);
			die($query);
		}
		
		function latest()
		{
			$data = self::$conn->query('items.ItemKey as id, items.Title, items.Series, items.SeriesNum, authors.Name, items.TypeKey, item.AcquiredDate FROM items JOIN authors USING (AuthorKey) ORDER BY AcquiredDate DESC LIMIT 0, 50');
			$result = array();
			while ($result[] = $data->fetch_object('Item'));
			return $result;
		}

		function makeFilter($field, $str)
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
		public $title = '';
		public $author = '';
		public $series = '';
		public $seriesNum = '';
		public $type = 0;
		public $acquireDate = '';
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

