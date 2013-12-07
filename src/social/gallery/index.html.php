<?php
chdir(__DIR__);

$albums = glob('*', GLOB_ONLYDIR);

function name($name)
{
	$name = strtr($name, array(
		'-' => ' ',
		'_' => ' '
	));
	$name = ucwords($name);
	$name = htmlentities($name);
	return $name;
}


?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<!--include "stubs/headers.html"-->
		<title>Gallery - ICSF</title>
	</head>
	<body>
		<!--include "stubs/h1-start.html"-->
			Gallery
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
		</nav>

		<div class="center">
<?php foreach ($albums as $album):

	$dir = $album;
	$album = name($album);
	$thumbs = glob($dir . '/*.thumb.png', GLOB_BRACE);

	if (empty($thumbs)) continue;
?>
			<a href="<?php echo $dir;?>/" class="thumb">
				<img src="<?php echo htmlentities(current($thumbs)); ?>" alt="<?php echo $album; ?>" width="100" height="100" />
				<?php echo $album, ' (', count($thumbs), ' items)'; ?>
			</a>
<?php endforeach; ?>
		</div>

		<!--include "stubs/footer.html"-->
	</body>
</html>

