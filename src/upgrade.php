<?php

$mapping = array(
	'/frameset.php?warp=events' => '/events/',
	'/frameset.php?warp=picocon' => '/picocon/',
	'/frameset.php?warp=searchlibrary' => '/library/search.php',
	'/social/index.html' => '/social/',
	'/library/index.html' => '/library/',
	'/php/news.php' => '/social/news',
	'/php/reviews.php' => '/social/reviews',
	'/php/index_committee.php' => '/committee/',
	'/php/events_calendar.php' => '/events/',
	'/php/recent_updates.php' => '/social/news/',
	'/intros/contact_details.html' => '/committee/',
	'/social/events/picocon/' => '/picocon/',
	'/social/irc/darkerirc/darker.html' => '/social/irc.html',
	'/library/misc/location.html' => '/library/finding.html',
	'/php/library_search.php' => '/library/search.php',
	'/php/request_list.php' => '/library/request.php',
	'/library/library_newstuff/index.php' => '/library/recent.php',
);

$regexmap = array(
	':^/library/minutes/committee/minutes[0-9]{4}:' => array(':^/library/minutes/committee/minutes([0-1][0-9])([0-9][0-9]):', '/committee/minutes/20$1-$2'),
	':^/library/minutes/committee:' => array(':^/library/minutes/committee/:', '/committee/minutes/'),
);

$url = $_SERVER['REQUEST_URI'];
$url = trim($url);
$url = preg_replace('@^<!--SRVROOT-->(/old)?@', '', $url);

if (array_key_exists($url, $mapping))
{
	header('Location: <!--SRVROOT-->' . $mapping[$url], false, 301);
	exit;
}

foreach ($regexmap as $rule => $rewrite)
{
	if (preg_match($rule, $url))
	{
		$url = preg_replace($rewrite[0], $rewrite[1], $url);
		header('Location: <!--SRVROOT-->' . $url, false, 301);
		exit;
	}
}

header('Cache-control: no-cache', false, 404);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Page Gone - ICSF</title>
		<meta name="robots" content="noindex,follow" />
	</head>
	<body>
		<h1>Page Gone</h1>
		<p>
			This page no longer exists, and we don't currently have a
			replacement listed.
		</p>
		<p>
			You can see if this page exists on the
			<a href="<!--SRVROOT-->/old<?php echo $url ?>">archived version of
			the new site.</a>
		</p>
		<p>
			If you think this page should exist, please contact the
			<a href="mailto:techpriest@icsf.org.uk">sysadmin</a>.
		</p>
	</body>
</html>
