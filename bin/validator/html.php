<?php

class HtmlValidator extends Validator
{
	public static $tags = array();

	protected $tagStack = array();

	protected function run($content)
	{
		$regex = '/\<(?<close>\/?)(?<tag>[a-z:!]+)(?<attrs> [^\/>]+)?(?<selfclose>\/?)\>/smU';
		$offset = 0;
		while (preg_match($regex, $content, $match, PREG_OFFSET_CAPTURE, $offset))
		{
			$offset  = $match[0][1] + strlen($match[0][0]);

			$match = array(
				'tag' => $match['tag'][0],
				'attrs' => $match['attrs'][0],
				'close' => !empty($match['close'][0]),
				'selfclose' => !empty($match['selfclose'][0])
			);
			print_r($match);
		}
	}
}

$head  = array('title', 'link', 'meta', 'script', 'style');
$secs  = array('header', 'nav', 'footer', 'div');
$block = array('nav', 'div', 'ul', 'ol', 'p', 'table');
$bflow = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'img');
$flow  = array('span', 'a', 'em', 'strong', 'img');
$exts  = array('script', 'style');

HtmlValidator::$tags['html'] = new HtmlTag('html', array('head', 'body'));
HtmlValidator::$tags['head'] = new HtmlTag('head', $head);
HtmlValidator::$tags['body'] = new HtmlTag('body', $secs + $block + $bflow + $flow + $exts);

foreach ($head as $elem)
{
	HtmlValidator::$tags[$elem] = new HtmlTag($elem);
}

foreach ($secs as $elem)
{
	HtmlValidator::$tags[$elem] = new HtmlTag($elem, $block + $bflow + $flow + $exts);
}

foreach ($block as $elem)
{
	HtmlValidator::$tags[$elem] = new HtmlTag($elem, $block + $bflow + $flow + $exts);
}

foreach ($bflow as $elem)
{
	HtmlValidator::$tags[$elem] = new HtmlTag($elem, $bflow + $flow + $exts);
}

HtmlValidator::$tags['span'] = new HtmlTag('span', $flow + $exts);
HtmlValidator::$tags['a'] = new HtmlTag('a', $flow + $exts, array('href'));
HtmlValidator::$tags['img'] = new HtmlTag('img', array(), array('alt', 'src', 'width', 'height'));

HtmlValidator::$tags['ul'] = new HtmlTag('ul', array('li'));
HtmlValidator::$tags['ol'] = new HtmlTag('ol', array('li'));
HtmlValidator::$tags['li'] = new HtmlTag('li', $block + $bflow + $flow + $exts);

HtmlValidator::$tags['table'] = new HtmlTag('table', array('thead', 'tbody'));
HtmlValidator::$tags['thead'] = new HtmlTag('thead', array('tr'));
HtmlValidator::$tags['tbody'] = new HtmlTag('tbody', array('tr'));
HtmlValidator::$tags['tr'] = new HtmlTag('tr', array('td'));
HtmlValidator::$tags['td'] = new HtmlTag('tr', $block + $bflow + $flow + $exts);

unset($head, $sec, $block, $bflow, $flow, $exts);

class HtmlTag
{
	/** @var string */
	public $name;
	/** @var array */
	public $children;
	/** @var array */
	public $attrs;

	public function __construct($name, array $children = array(), array $attrs = array())
	{
		$this->name = $name;
		$this->children = array_flip($children);
		$this->attrs = array_flip($attrs);
	}

	public function isChildPermitted($child)
	{
		return array_key_exists($child, $this->children);
	}

	public function getMissingAbbributes(array $attrs)
	{
		return array_flip(array_diff_key($this->attrs, $attrs));
	}
}
