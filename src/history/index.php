<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<!--include "stubs/headers.html"-->
		<title>History - ICSF</title>
		<style type="text/css">
			table.timeline
			{
				border-collapse: collapse;
			}

			div.container
			{
				min-width: 20em;
				min-height: 200px;
				width: 40em;
				height: 500px;
				resize: both;

				overflow-y: auto;
				margin: 1em auto;

				background: white;
				background-clip: padding-box;
				border-width: 18px 32px 17px 58px;
				border-image: url('<!--SRVROOT-->/resources/book.png') 36 64 17 115 stretch;
				-moz-border-image: url('<!--SRVROOT-->/resources/book.png') 36 64 17 115 stretch;
				-o-border-image: url('<!--SRVROOT-->/resources/book.png') 36 64 17 115 stretch;
			}

			.timeline td
			{
				font-size: 0.8em;
				height: 50px;
				padding: 0 1em;
				border-right: 3px solid rgba(0,64,255,0.5);
			}

			.timeline tr:nth-child(even) td
			{
				border-right: 3px solid rgba(0,255,64,0.5);
			}

			td.container
			{
				vertical-align: top;
				position: relative;
				line-height: 0;
				overflow-y: visible;
				min-width: 400px;
				padding: 0 1em;
				height: auto;
				border: none;
			}

			td.container>div
			{
				position: relative;
				vertical-align: middle;
				width: auto;
			}
		</style>
	</head>
	<body>
		<!--include "stubs/h1-start.html"-->
			The History Book
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
		</nav>

<?php
	function add_event($date, $title, $link=null)
	{
		$years  = (int)date('Y', strtotime($date)) - 1976;
		$months = (int)date('m', strtotime($date));
		$offset = (int)($years * 50 + $months * 4) + 2;

		if ($link == null)
		{
			echo '<div style="top: ' . $offset . 'px;">' . $title . '</div>' . PHP_EOL;
		}
		else
		{
			echo '<div style="top: ' . $offset . 'px;"><a href="' . $link .
			'">' . $title . '</a></div>' . PHP_EOL;
		}
	}

?>
		<p>
			Welcome to the ICSF history book.
			The society was founded almost 40 years ago and has grown over the
			year from modest beginnings with a few books in a cupboard to a
			library of over 13000, and acquiring a lot of history along the
			way. Some of that history even has a tendency to turn up a Picocon
			and natter on about the good all days.

			The society history page contains the records that we've been told,
			and can still remember once we've recovered from the hangover the
			next morning, and contain records of committee and other members,
			publications and events, with additional pages for each Picocon,
			and major events in the Library's history.
		</p>
		<p>
			The information, however, is still incomplete.
			If you've got anything you can contribute, drop the secretary an
			email at <a href="mailto:secretary@icsf.co.uk">secretary@icsf.co.uk</a>.
		</p>

		<div class="container"><table class="timeline">
			<tr>
				<td>1976</td>
				<td rowspan="36" class="container">
<?php
					add_event('Sep 1976', 'Society Founded');
					add_event('Sep 1980', 'Chair\'s Pot List Begins');
					add_event('Oct 2004', 'ICSF Bookclub \'Book of the Month\' started');
					add_event('June 2006', 'First Hay-on-Wye bookcrawl');

					add_event('1981', 'Books get first "home" - the Green Committee Room');
					add_event('Sept 1987', 'The First Library: Beit Basement');
					add_event('July 1995', 'Library is first computerised');
					add_event('Sept 1996', 'TV + VHS Player acquired');
					add_event('June 1998', 'Library moved deeper into the basement');
					add_event('Oct 1999', 'Library moved to a portacabin behind the Central Library');
					add_event('July 2001', 'Library moved into Beit Media Centre');
					add_event('June 2005', 'Library acquires first DVD');
					add_event('July 2007', 'Old shelving replaced with uniform, wooden shelves');

					add_event('Feb 1984', 'First Picocon: Pico-Con', '<!--SRVROOT-->/history/picocon.html');
					add_event('Feb 1985', 'Picocon Pi', '<!--SRVROOT-->/history/pico_pi.html');;
					add_event('Feb 1986', 'Picocon 4', '<!--SRVROOT-->/history/pico_4.html');;
					add_event('Feb 1987', 'Picocon 5', '<!--SRVROOT-->/history/pico_5.html');;
					add_event('Feb 1988', 'Picocon 6', '<!--SRVROOT-->/history/pico_6.html');;
					add_event('Feb 1989', 'Picocon 7', '<!--SRVROOT-->/history/pico_7.html');;
					add_event('Feb 1990', 'Picocon 8', '<!--SRVROOT-->/history/pico_8.html');;
					add_event('Feb 1991', 'Picocon 9', '<!--SRVROOT-->/history/pico_9.html');;
					add_event('Feb 1992', 'Picocon 10', '<!--SRVROOT-->/history/pico_10.html');;
					add_event('Feb 1993', 'Picocon 11', '<!--SRVROOT-->/history/pico_11.html');;
					add_event('Feb 1995', 'Picocon 12', '<!--SRVROOT-->/history/pico_12.html');;
					add_event('Feb 1996', 'Picocon 13', '<!--SRVROOT-->/history/pico_13.html');;
					add_event('Feb 1997', 'Picocon 14', '<!--SRVROOT-->/history/pico_14.html');;
					add_event('Feb 1998', 'Picocon 15', '<!--SRVROOT-->/history/pico_15.html');;
					add_event('Feb 1999', 'Picocon 16', '<!--SRVROOT-->/history/pico_16.html');;
					add_event('Feb 2000', 'Picocon 17', '<!--SRVROOT-->/history/pico_17.html');;
					add_event('Feb 2001', 'Picocon 18', '<!--SRVROOT-->/history/pico_18.html');;
					add_event('Feb 2002', 'Picocon 19', '<!--SRVROOT-->/history/pico_19.html');;
					add_event('Feb 2003', 'Picocon 20', '<!--SRVROOT-->/history/pico_20.html');;
					add_event('Feb 2004', 'Picocon 21', '<!--SRVROOT-->/history/pico_21.html');;
					add_event('Feb 2005', 'Picocon 22', '<!--SRVROOT-->/history/pico_22.html');;
					add_event('Feb 2006', 'Picocon 23', '<!--SRVROOT-->/history/pico_23.html');;
					add_event('Feb 2007', 'Picocon 24', '<!--SRVROOT-->/history/pico_24.html');;
					add_event('Feb 2008', 'Picocon 25', '<!--SRVROOT-->/history/pico_25.html');;
					add_event('Feb 2009', 'Picocon 26', '<!--SRVROOT-->/history/pico_26.html');;
					add_event('Feb 2010', 'Picocon 27', '<!--SRVROOT-->/history/pico_27.html');;
					add_event('Feb 2011', 'Picocon 28', '<!--SRVROOT-->/history/pico_28.html');;
					add_event('Feb 2012', 'Picocon 29', '<!--SRVROOT-->/history/pico_29.html');;
?>
				</td>
			</td>

			<tr><td>1977</td></tr>
			<tr><td>1978</td></tr>
			<tr><td>1979</td></tr>
			<tr><td>1980</td></tr>
			<tr><td>1981</td></tr>
			<tr><td>1982</td></tr>
			<tr><td>1983</td></tr>
			<tr><td>1984</td></tr>
			<tr><td>1985</td></tr>
			<tr><td>1986</td></tr>
			<tr><td>1987</td></tr>
			<tr><td>1988</td></tr>
			<tr><td>1989</td></tr>
			<tr><td>1990</td></tr>
			<tr><td>1991</td></tr>
			<tr><td>1992</td></tr>
			<tr><td>1993</td></tr>
			<tr><td>1994</td></tr>
			<tr><td>1995</td></tr>
			<tr><td>1996</td></tr>
			<tr><td>1997</td></tr>
			<tr><td>1998</td></tr>
			<tr><td>1999</td></tr>
			<tr><td>2000</td></tr>
			<tr><td>2001</td></tr>
			<tr><td>2002</td></tr>
			<tr><td>2003</td></tr>
			<tr><td>2004</td></tr>
			<tr><td>2005</td></tr>
			<tr><td>2006</td></tr>
			<tr><td>2007</td></tr>
			<tr><td>2008</td></tr>
			<tr><td>2009</td></tr>
			<tr><td>2010</td></tr>
			<tr><td>2011</td></tr>
			<tr><td>2012</td></tr>
		</table></div>

		<!--include "stubs/footer.html"-->
	</body>
</html>

