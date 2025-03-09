<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<!--include "stubs/headers.html"-->
		<title>ICSF Library - ICSF</title>
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
	$counts = Database::getItemTypes();

	$books  = (int)floor($counts[1]->count/200) * 200;
	$dvds   = (int)floor($counts[5]->count/200) * 200;
	$gns    = (int)floor($counts[2]->count/500) * 500;
?>
		<p>
			The library contains over <b><?php echo $books;?> books</b>,
			<b><?php echo $dvds; ?> DVDs</b>, and has a <?php echo $gns;?>-strong
			collection of <b>graphic novels</b>, as well as a selection of
			other media items.
			We try to maintain a range of science fiction, fantasy and horror,
			covering both popular and obscure authors, films, and TV series.
			To take stuff out you need to be an ICSF member (costs &pound;8).

			You can <a href="search.php">search the database</a> to see if
			we have what you want.

			If we don't, you can <a href="request-list.php">request it</a>
			and we'll see what we can do.

			If you have any queries please contact email the
			<a href="mailto:icsf.librarian@gmail.com">librarian</a>.

			If you happen to be looking for bookshops, see
			<a href="bookshops.html">our bookshop guide</a>.
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

		<h2>Membership and Loans</h2>

		<p>
			Membership costs only &pound;8 per academic year; you can
			<a href="https://www.imperialcollegeunion.org/activities/a-to-z/science-fiction-and-fantasy">purchase membership</a>
			from the Imperial College Union website, and entitles
			you to borrow books, videos, DVDs, graphic novels and audio books.
			You may borrow up to three items at a time, one of which may be
			a non-book.
		</p>
		<p>
			If you want to see some of the things we do before joining, just
			<a href="<!--SRVROOT-->/library/getting-to.html">drop-in to the library</a>
			at lunchtime, or join us for one of our bar nights or other
			<a href="<!--SRVROOT-->/events/">events</a>.
		</p>
		<p>
			Books can be borrowed for up to 30 days, non-books for 2 college
			days (due to higher demand).
			Loans over the Christmas and Easter holidays, are allowed, with
			the items due for returned at the beginning of the next term.
		</p>

		<!--include "stubs/footer.html"-->
	</body>
</html>
