<?php
	define('LIBRARY_PROTOCOL', 'http://');
	define('LIBRARY_DB_SRV', 'icsflibsrv.su.ic.ac.uk');
	define('LIBRARY_DB_PATH', '/library/');
	define('LIB_XML', LIBRARY_PROTOCOL . LIBRARY_DB_SRV . LIBRARY_DB_PATH . '_xml/');

	class Database
	{
		/**
		 * Returns an array of item type names
		 */
		function getItemTypes()
		{
			$xml = new SimpleXMLElement(file_get_contents(LIB_XML . 'get_item_types_stub.php'));

			$types = array();$i = 0;

			foreach($xml->ItemType as $type)
				$types[++$i] = (string)$type;

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
			$uri = LIB_XML . 'library_search_stub.php';
			$uri .= '?Title='   . urlencode($conditions->title);
			$uri .= '&Author='  . urlencode($conditions->author);
			$uri .= '&Series='  . urlencode($conditions->series);
			$uri .= '&TypeKey=' . urlencode($conditions->type);
			$uri .= '&int='     . urlencode($conditions->offset);
			$uri .= '&lim='     . urlencode($conditions->limit);
			$uri .= '&order='   . urlencode($conditions->order);
			$uri .= '&AcquireDate=' . urlencode($conditions->acquireDate);

			$search = new SimpleXMLElement(file_get_contents($uri));

			$results = array();

			foreach ($search->IcsfItem as $item)
			{
				$results[] = Item::fromXML($item);
			}

			return (int)$search->hits;
		}
	}

	class Item
	{
		public $id = 0;
		public $title = '';
		public $author = '';
		public $series = '';
		public $type = 0;
		public $acquireDate = '';
		
		function fromXML($xml)
		{
			$ret = new Item();
			$ret->id   = (int)$xml->{@attributes}->key;
			$ret->title  = (string)$xml->Title;
			$ret->author = (string)$xml->Author;
			$ret->series = (string)$xml->Series;
			$ret->type = (int)$xml->TypeKey;
			$ret->acquireDate = strtotime((string)$xml->AcquireDate);
			return $ret;
		}
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

