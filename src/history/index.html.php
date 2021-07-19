<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<!--include "stubs/headers.html"-->
		<link rel="stylesheet" type="text/css" href="<!--SRVROOT-->/resources/history.css" />
		<title>History - ICSF</title>
	</head>
	<body>
		<!--include "stubs/h1-start.html"-->
			The History Book
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
		</nav>

<?php

	if ('UTC' === date_default_timezone_get())
	{
		date_default_timezone_set('UTC');
	}

	$year  = (int)date('Y');
	$years = $year - 1975;

	function add_event($date, $title, $link=null)
	{
		$years  = (int)date('Y', strtotime($date)) - 1976;
		$months = (int)date('m', strtotime($date));
		$offset = (int)($years * 50 + $months * 4) + 2;

		if ($link === null)
		{
			echo "\t\t\t\t\t" , '<div style="top: ' , $offset , 'px;">' , $title , '</div>' , PHP_EOL;
		}
		else
		{
			echo "\t\t\t\t\t" , '<div style="top: ' , $offset , 'px;"><a href="' , $link ,
			'">' , $title , '</a></div>' , PHP_EOL;
		}
	}

?>
		<p>
			Welcome to the ICSF history book.
			The society was founded over 40 years ago and has grown over the
			year from modest beginnings with a few books in a cupboard to a
			library of over 13000, and acquiring a lot of history along the
			way. Some of that history even has a tendency to turn up at Picocon
			and natter on about the good old days.

			The society history page contains the records that we've been told,
			and can still remember once we've recovered from the hangover the
			next morning, and contain records of committee and other members,
			publications and events, with additional pages for each Picocon,
			and major events in the Library's history.
		</p>
		<p>
			The information, however, is still incomplete.
			If you've got anything you can contribute, drop the secretary an
			email at <a href="mailto:icsf.secretary@gmail.com">icsf.secretary@gmail.com</a>.
		</p>

		<div id="book"><table class="timeline">
			<tr>
				<td>1976</td>
				<td rowspan="<?php echo $years ?>" class="container">
<?php
	add_event('Sep 1976', 'Society Founded');
	add_event('Sep 1980', 'Chair\'s Pot List Begins');
	add_event('Oct 1996', 'Wyrmtongue Founded', '<!--SRVROOT-->/publications/#wyrmtongue');
	add_event('Oct 2004', 'ICSF Bookclub \'Book of the Month\' started');
	add_event('June 2006', 'First Hay-on-Wye bookcrawl');

	add_event('1981', 'Books get first "home" - the Green Committee Room');
	add_event('Sept 1987', 'The First Library: Beit Basement');
	add_event('July 1995', 'Library is first computerised');
	add_event('June 1996', 'TV + VHS Player acquired');
	add_event('June 1998', 'Library moved deeper into the basement');
	add_event('Oct 1999',  'Library moved to a portacabin behind the Central Library');
	add_event('July 2001', 'Library moved into Beit Media Centre');
	add_event('June 2005', 'Library acquires first DVD');
	add_event('July 2007', 'Old shelving replaced with uniform, wooden shelves');
	add_event('Oct 2010',  'Library acquires first Blu-ray Disc');
	add_event('Oct 2011',  'Picocon Sofa pot purchased');

	add_event('Feb 1984', 'Picocon',    '<!--SRVROOT-->/history/picocon/picocon01.html');
	add_event('Feb 1985', 'Picocon Pi', '<!--SRVROOT-->/history/picocon/picocon03.html');
	add_event('Feb 1986', 'Picocon 4',  '<!--SRVROOT-->/history/picocon/picocon04.html');
	add_event('Feb 1987', 'Picocon 5',  '<!--SRVROOT-->/history/picocon/picocon05.html');
	add_event('Feb 1988', 'Picocon 6',  '<!--SRVROOT-->/history/picocon/picocon06.html');
	add_event('Feb 1989', 'Picocon 7',  '<!--SRVROOT-->/history/picocon/picocon07.html');
	add_event('Feb 1990', 'Picocon 8',  '<!--SRVROOT-->/history/picocon/picocon08.html');
	add_event('Feb 1991', 'Picocon 9',  '<!--SRVROOT-->/history/picocon/picocon09.html');
	add_event('Feb 1992', 'Picocon 10', '<!--SRVROOT-->/history/picocon/picocon10.html');
	add_event('Feb 1993', 'Picocon 11', '<!--SRVROOT-->/history/picocon/picocon11.html');
	add_event('Feb 1995', 'Picocon 12', '<!--SRVROOT-->/history/picocon/picocon12.html');
	add_event('Feb 1996', 'Picocon 13', '<!--SRVROOT-->/history/picocon/picocon13.html');
	add_event('Feb 1997', 'Picocon 14', '<!--SRVROOT-->/history/picocon/picocon14.html');
	add_event('Feb 1998', 'Picocon 15', '<!--SRVROOT-->/history/picocon/picocon15.html');
	add_event('Feb 1999', 'Picocon 16', '<!--SRVROOT-->/history/picocon/picocon16.html');
	add_event('Feb 2000', 'Picocon 17', '<!--SRVROOT-->/history/picocon/picocon17.html');
	add_event('Feb 2001', 'Picocon 18', '<!--SRVROOT-->/history/picocon/picocon18.html');
	add_event('Feb 2002', 'Picocon 19', '<!--SRVROOT-->/history/picocon/picocon19.html');
	add_event('Feb 2003', 'Picocon 20', '<!--SRVROOT-->/history/picocon/picocon20.html');
	add_event('Feb 2004', 'Picocon 21', '<!--SRVROOT-->/history/picocon/picocon21.html');
	add_event('Feb 2005', 'Picocon 22', '<!--SRVROOT-->/history/picocon/picocon22.html');
	add_event('Feb 2006', 'Picocon 23', '<!--SRVROOT-->/history/picocon/picocon23.html');
	add_event('Feb 2007', 'Picocon 24', '<!--SRVROOT-->/history/picocon/picocon24.html');
	add_event('Feb 2008', 'Picocon 25', '<!--SRVROOT-->/history/picocon/picocon25.html');
	add_event('Feb 2009', 'Picocon 26', '<!--SRVROOT-->/history/picocon/picocon26.html');
	add_event('Feb 2010', 'Picocon 27', '<!--SRVROOT-->/history/picocon/picocon27.html');
	add_event('Feb 2011', 'Picocon 28', '<!--SRVROOT-->/history/picocon/picocon28.html');
	add_event('Feb 2012', 'Picocon 29', '<!--SRVROOT-->/history/picocon/picocon29.html');
	add_event('Feb 2013', 'Picocon 30', '<!--SRVROOT-->/history/picocon/picocon30.html');
	add_event('Feb 2014', 'Picocon 31', '<!--SRVROOT-->/history/picocon/picocon31.html');
?>
				</td>
			</tr>
<?php foreach(range(1977, $year) as $y): ?>
			<tr><td><?php echo $y ?></td></tr>
<?php endforeach; ?>
		</table></div>

		<!--include "stubs/footer.html"-->
	</body>
</html>
