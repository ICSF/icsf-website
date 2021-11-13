<?php
	error_reporting(E_ALL ^ E_STRICT ^ E_NOTICE ^ E_WARNING);
	set_error_handler(function ($e) { var_dump($e); }, E_ALL);
	set_exception_handler(function ($e) { var_dump($e); });

	$protocol = !empty($_SERVER['HTTPS']) ? 'https' : 'http';
	$host = @$_SERVER['HTTP_HOST'] ?: '';

	date_default_timezone_set('UTC');
	$days_to_picocon = 52 - date('z');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" itemscope itemtype="http://schema.org/Event">
	<head>
		<!--include "stubs/headers.html"-->
		<title>Picocon 38 - ICSF</title>
		<style type="text/css">
			@font-face
			{
			    font-family: "Johnston";
			    src: url(<!--SRVROOT-->/resources/London-Tube.ttf);
			}
			.tube-line
			{
				font-family: Johnston, sans-serif;
				border-radius: 5px;
				padding: 3px 4px;
				margin: 1px;
				font-size: 10pt;
				display: inline-block;
			}
			table { margin: 10px 0; border-collapse: collapse; }
			td { padding: 4px 8px; vertical-align: top; border: 1px solid #aaa; }
			td .note { font-size: smaller; font-style: italic; }
			#buy {
				font-size: 40pt;
				text-align: center;
				font-family: 'Alice',serif;
			}
			#buy div {
				display: inline-block;
				font-size: 12pt;
				padding: 8px;
				background: rgba(64,64,64,0.5);
				border-radius: 8px;
				text-align: center;
				width: 220px;
				height: 60px;
				vertical-align: middle;
				line-height: 28px;
				margin-bottom: 10px;
				color: #f1f1f1;
			}
			#buy div:hover {
				color: #fff;
				background: rgba(32,32,32,0.5);
			}
			#buy a { color: inherit; text-decoration: none; }
			#buy a:first-child { font-size: 1.5em }
			#buy hr { margin: 3px 0; border-color: #aaa; }
			#jpForm {
				display: inline-block;
				background: #eee;
				color:#113B92;
				border: 1px solid #103994;
				border-radius: 4px;
				box-shadow: 2px 2px 3px 1px #ccc;
				padding: 0 10px 15px;
				text-align: center;
			}
			#jpForm input[type="submit"] {
				border-style: none;
				background-color: #157DB9;
				display: inline-block;
				padding: 4px 11px;
				color: #fff;
				text-decoration: none;
				border-radius: 3px;
				box-shadow: 0 1px 3px rgba(0,0,0,0.25);
				border-bottom: 1px solid rgba(0,0,0,0.25);
				font: bold  13px/1 Arial,Helvetica,sans-serif;
				text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
				margin-top: 5px;
			}
		</style>

		<meta itemprop="url" content="https://www.union.ic.ac.uk/scc/icsf/picocon/" />
		<!-- <meta itemprop="image" content="<?php echo $protocol; ?>://<?php echo $host; ?><!--SRVROOT-->/picocon/images/picocon31.png" /> -->
		<meta itemprop="startDate" content="2016-02-20T10:00:00Z" />
		<meta itemprop="endDate" content="2016-02-20T20:00:00Z" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo $protocol; ?>://<?php echo $host; ?><!--SRVROOT-->/picocon/" />
		<meta property="og:title" content="Picocon 33: 'Origins'" />''
		<meta property="og:description" content="Picocon 33 will be on the 20th of Feburary 2016. Picocon is a small London convention hosted at each year Imperial College." />
		<meta property="og:image" content="<?php echo $protocol; ?>://<?php echo $host; ?><!--SRVROOT-->/picocon/picocon38.png" />

		<meta property="twitter:card" content="summary_large_image" />
		<meta property="twitter:site" content="@picocon" />
		<meta property="twitter:creator" content="@picocon" />
		<meta property="twitter:title" content="Picocon 38: <automata> - 20th Feburary" />
		<meta property="twitter:description" content="Picocon 38 will be on the 20th of February 2021. Picocon is a small London convention hosted each year at Imperial College." />
		<meta property="twitter:image:src" content="<?php echo $protocol; ?>://<?php echo $host; ?><!--SRVROOT-->/picocon/picocon33.png" />

		<script async="async" defer="defer" src="//connect.facebook.net/en_GB/all.js#appId=269862736478026"></script>
		<script async="async" defer="defer" src="//platform.twitter.com/widgets.js"></script>
	</head>
	<body>
		<h1>
			<a href="<!--SRVROOT-->/">
				<img id="logo" src="<!--SRVROOT-->/resources/logo.png" alt="ICSF Logo" />
			</a>
			<span itemprop="name">Picocon 38 - &lt;automata&gt;</span>
			<span id="subtitle">20th February 2017</span>
		</h1>

		<nav>
			<!--include "stubs/nav-main.html"-->
			<hr />
			<a href="https://www.imperialcollegeunion.org/shop/student-groups/429">Buy Tickets</a>
			<a href="#goh">Guests</a>
			<a href="#timetable">Timetable</a>
			<a href="#prices">Prices</a>
			<a href="#contact">Contact Us</a>
		</nav>

		<p style="font-variant: small-caps; font-size: 16pt; text-align: center;">
			<span itemprop="alternateName">Picocon 38</span>
			will be held on
			Saturday 20th February 2021,
			online.
		</p>

		<h2>What is Picocon?</h2>
		<div class="columns">
		<div itemprop="description">
		<p>
			Picocon is the annual Science Fiction &amp; Fantasy convention
			run by the Imperial College Science Fiction and Fantasy Society, ICSF.
			It usually takes place on a Saturday in February, in Imperial
			College&apos;s Student Union. This year it will be taking place online.
			We try not to clash with other conventions around the same time.
		</p>
		<p>
			It is a small (hence the name), affordable and convenient convention
			for students and fans in or near London.
			Events begin at
			around 11:00.
			The schedule concludes in the evening.
		</p>
		<p>
			At the online Picocon you will encounter:
		</p>

		<ul>
			<li>Guests of Honour doing talks and panels</li>
			<li>Pub Quiz and silly games</li>
        	<li>Fun online charity events</li>
		</ul>
		</div>
		<img src="picocon38.png" style="display: block; max-width: 80%; max-height: 400px; margin: 5px auto;" alt="Picocon 38 logo" />
		</div>

		<div style="height: 30px;">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.union.ic.ac.uk/scc/icsf/picocon/" data-text="" data-via="picocon" data-hashtags="picocon38">Tweet</a>
			<div class="fb-like" data-href="https://www.union.ic.ac.uk/scc/icsf/picocon/" data-send="true" data-width="380" data-show-faces="false"></div>
		</div>

		<h2 id="goh">Guests of Honour</h2>
                <p>Speaking at Picocon 34 this year will be:</p>
		<div class="columns">
			<ul>
				<li>Jeff Somers</li><li>Dan Moren</li><li>SJ Kincaid</li><li>David Brian Johnson</li>
			</ul>

			<div class="no-break">
				<h2 id="timetable">Timetable</h2>
				<!--for two-day Picocons--><!--	<h3>Saturday</h3>-->
					<table>
						<tbody>
							<tr>
								<td>11:00-14:00</td>
								<td>Fun and Games</td>
							</tr>
							<tr>
								<td>14:30-15:30</td>
								<td>Guest Talk 1<br/><i>Jeff Somers</i></td>
							</tr>
							<tr>
								<td>15:30-16:00</td>
								<td>Guest Talk 2<br/><i>Dan Moren</i></td>
							</tr>
							<tr>
								<td>16:15-17:00</td>
								<td>Charity Events</td>
							</tr>
							<tr>
								<td>17:00-17:45</td>
								<td>Guest Talk 3<br/><i>SJ Kincaid</i></td>
							</tr>
							<tr>
								<td>18:00-18:45</td>
								<td>Guest Talk 4<br/><i>Brian David Johnson</i></td>
							</tr>
							<tr>
								<td>20:00-21:00</td>
								<td>Panel</td>
							</tr>
							<tr>
								<td>21:00-23:00</td>
								<td>Pub Quiz</td>
							</tr>
						</tbody>
					</table>
					<!--Two-day Picocons only!--><!--<h3>Sunday</h3>
					<table>
						<tbody>
							<tr>
								<td>10:00</td>
								<td>Kari Sperring</td>
							</tr>
							<tr>
								<td>11:00</td>
								<td>Ian McDonald</td>
							</tr>
							<tr>
								<td>12:00</td>
								<td>Lunch</td>
							</tr>
							<tr>
								<td>13:30</td>
								<td>Sunday authors panel and book signing</td>
							</tr>
							<tr>
								<td>14:30</td>
								<td>Silly games</td>
							</tr>
							<tr>
								<td>16:00</td>
								<td>Pub quiz</td>
							</tr>
						</tbody>
					</table>-->
			</div>

			<div class="no-break">
				<h2 id="prices">Prices</h2>

				<p>
					The event is <strong>free</strong> this year, and all are welcome!
				</p>
			</div>

			<h2 id="directions">Links to access Picocon</h2>
	        <p>
			The event will be streamed on the streaming platform Crowdcast, in combination with the Picocon Discord Server for our other games & the pub quiz.<br><br>
	        Crowdcast link: <a href="http://bit.ly/Picocon38" target="_blank">http://bit.ly/Picocon38</a><br>
	        Discord link: <a href="https://discord.com/invite/HFvfBS7hB8" target="_blank">https://discord.com/invite/HFvfBS7hB8</a><br>
	        <!--Donate to charity here: <a href="https://www.union.ic.ac.uk/scc/icsf/donate/" target="_blank">https://www.union.ic.ac.uk/scc/icsf/donate/</a><br><br>-->
	        You can sign up for both the Crowdcast and Discord now!
	        </p>

			<h2 id="contact">Contact Us</h2>
			<p>
				For more information, please contact <b>Ibraheem Wazir</b>,
				the Picocon Sofa (comfier than a chair), at
				<a class="sans" href="mailto:icsf.picoconsofa@gmail.com">icsf.picoconsofa@gmail.com</a>.
			</p>
			<p>Our mail address is the following:</p>
			<blockquote itemprop="location" itemscope itemtype="http://schema.org/PostalAddress">
				ICSF<br />
				Student Activities Centre<br />
				<span itemprop="name">Imperial College Students' Union</span><br />
				<span itemprop="streetAddress">Beit Quad<br />
				Prince Consort Road</span><br />
				<span itemprop="addressRegion">London</span><br />
				<span itemprop="postalCode">SW7 2BB</span><br />
				<span itemprop="addressCountry">UK</span>
			</blockquote>
		</div>

		<footer>
			<p>
				The first Picocon was in 1984.
				If you&apos;re curious, we have a record of <a href="<!--SRVROOT-->/history/">Picocons of years gone by</a>.
			</p>
			<p class="copyright">Imperial College Science Fiction Society. Please report issues to
			<a href="mailto:icsf.techpriest@gmail.com">icsf.techpriest@gmail.com</a></p>
		</footer>

	</body>
</html>
