<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<!--include "stubs/headers.html"-->
		<title>ICSF - Imperial College Science Fiction and Fantasy</title>
	</head>
	<body>
		<!--include "stubs/h1-start.html"-->
			Library
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
			<hr />
			<!--include "stubs/nav-lib.html"-->
		</nav>
<?php
	include 'database/database.inc';
	$counts = Database::getItemCounts();

	$books  = (int)floor($counts['Book']/200) * 200;
	$dvds   = (int)floor($counts['DVD']/200) * 200;
	$gns    = (int)floor($counts['Graphic Novel']/500) * 500;
?>
		<p>
			The library contains over <b><?php echo $books;?> books</b>,
			<b><?php echo $dvds; ?> DVDs</b>, and has a <?php echo $gns;?>-strong
			collection of <b>graphic novels</b>, as well as a selection of
			other media items.
			We try to maintain a range of science fiction, fantasy and horror,
			covering both popular and obscure authors, films, and tv series.
			To take stuff out you need to be an icsf member (costs &pound;8).

			You can <a href="search.php">search the database</a> to see if
			we have what you want.

			If we don't, <a href="request_list.php">you can request it</a>
			and we'll see what we can do.

			If you have any queries please contact email the
			<a href="mailto:librarian@icsf.co.uk">librarian</a>.

			If you happen to be looking for bookshops, see
			<a href="bookshops.php">our guide</a>.
		</p>

		<h2>Opening Hours</h2>
		<p>
			During term times, the library is officially open every weekday
			lunchtime from 12 noon to 2pm.
			However, the lure of the ICSF library is almost always strong
			enough to entice at least one committee member to remain in the
			library during the entire afternoon and usually the evening
			as well.
			Feel free to pop in at any time!
		</p>

		<img class="hang-right" src="http://union.ic.ac.uk/scc/icsf/ftpupload/icsfcam.jpeg"
		style="width: 320px; height: 240px;" alt="ICSF Library Webam" />
		<h2>Library Webcam</h2>

		<p>
			The webcam, shown left, can be used to find out if the library is
			currently open, how busy it is and - if you can tell from a single
			frame - what people are watching.
		</p>

		<h2>Membership and Loans</h2>
		<p>
			If you want to join, just come along to the library at lunchtime,
			or one of our events.
		</p>
		<p>
			<b>Membership costs &pound;8</b> per academic year, and entitles
			you to borrow books, videos, DVDs, graphic novels and audio books.
			You may borrow up to three items at a time, one of which may be
			a non-book.
			Books can be borrowed for up to 30 days, non-books for 2 college
			days (due to higher demand).
			Loans over the Christmas and Easter holidays, are allowed, with
			the items due for returned at the beginning of the next term.
		</p>

		<!--include "stubs/footer.html"-->
	</body>
</html>

