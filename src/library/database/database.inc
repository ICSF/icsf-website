<?php
	class Database
	{
		public static $conn;

		public static function getItemCounts()
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

	class SearchConditions
	{
		public $title = '';
		public $author = '';
		public $series = '';
		public $type = 0;
		public $acquireDate = '';

		public $limit = 50;
		public $offset = 1;

		public $order = 'Type, Author, Series, SeriesNum, Title';
	}

