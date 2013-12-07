<?php
chdir(__DIR__);

$dir = end(explode('/', __DIR__));
$name = name($dir);

$files = glob('*.{jpg,png,gif,bmp}', GLOB_BRACE);

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
		<title>Gallery "<?php echo $name; ?> - ICSF</title>
	</head>
	<body>
		<!--include "stubs/h1-start.html"-->
			Gallery &ldquo;<?php echo $name; ?>&rdquo;
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
		</nav>

		<a href="<!--SRVROOT-->/social/gallery">Back to Gallery Index</a>
		<div class="center">
<?php foreach ($files as $file):
	if (substr($file, -9, -4) === 'thumb') continue;

	$thumb = substr($file, 0, -4) . '.thumb.png';
?>
			<a href="<?php echo htmlentities($file); ?>" class="thumb">
				<img src="<?php echo htmlentities($thumb); ?>" width="100" height="100" />
				<?php echo name(substr($file, 0, -4)); ?>
			</a>
<?php endforeach; ?>
		</div>
		<a href="<!--SRVROOT-->/social/gallery">Back to Gallery Index</a>

		<!--include "stubs/footer.html"-->
	</body>
</html>

