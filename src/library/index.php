<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/scc/icsf/resources/style.css" />
		<link href="//fonts.googleapis.com/css?family=Lora|Alice" rel="stylesheet" type="text/css" />
		<link rel="icon" href="/scc/icsf/resources/logo.png" />
		<title>ICSF Library - ICSF</title>
	</head>
	<body>
		<h1>
			<a id="logo" href="/scc/icsf/">
				<img src="/scc/icsf/resources/logo.png" alt="ICSF Logo" width="93" height="60" />
			</a>
			ICSF
			<span id="subtitle">
			Library
			</span>
		</h1>

		<nav>
			<a href="/scc/icsf/">Home</a>
			<a href="/scc/icsf/events/">Events</a>
			<a href="/scc/icsf/library/">Library</a>
			<a href="/scc/icsf/committee/">Committee</a>
			<a href="/scc/icsf/publications/">Publications</a>
			<a href="/scc/icsf/picocon/">Picocon</a>
			<a href="/scc/icsf/social/quotes/">Quotes</a>
			<a href="/scc/icsf/social/gallery/">Gallery</a>
			<a href="/scc/icsf/history/">History</a>
			<hr />
			<h3>Library</h3>
			<a href="/scc/icsf/library/getting-to.html">Finding Us</a>
			<a href="/scc/icsf/library/search.php">Database Search</a>
			<a href="/scc/icsf/library/new-items.php">New Items</a>
			<a href="/scc/icsf/library/request-list.php">Request List</a>
			<a href="/scc/icsf/library/bookshops.html">Bookshops</a>
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

		<img class="hang-right" src="/scc/icsf/webcam.jpeg"
		width="320" height="240" alt="ICSF Library Webam" /> 

		<h2>Library Webcam</h2>

		<p>
			The webcam, shown right, can be used to find out if the library is
			currently open, how busy it is and &mdash; if you can tell from a
			single frame &mdash; what people are watching.
		</p>
		<p>
			You can also view the webcam at full size on the
			<a href="/scc/icsf/webcam.php">Webcam page</a>
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
			<a href="/scc/icsf/library/getting-to.html">drop-in to the library</a>
			at lunchtime, or join us for one of our bar nights or other
			<a href="/scc/icsf/events/">events</a>.
		</p>
		<p>
			Books can be borrowed for up to 30 days, non-books for 2 college
			days (due to higher demand).
			Loans over the Christmas and Easter holidays, are allowed, with
			the items due for returned at the beginning of the next term.
		</p>

		<footer>
			<p class="copyright">
			Imperial College Science Fiction Society. Please report issues to
			<a href="mailto:techpriest@icsf.org.uk">techpriest@icsf.org.uk</a>
			</p>
		</footer>

	</body>
</html>

