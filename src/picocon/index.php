<?php
	error_reporting(E_ALL ^ E_STRICT ^ E_NOTICE ^ E_WARNING);
	set_error_handler(function ($e) { var_dump($e); }, E_ALL);
	set_exception_handler(function ($e) { var_dump($e); });

	$protocol = !empty($_SERVER['HTTPS']) ? 'https' : 'http';
	$host = @$_SERVER['HTTP_HOST'] ?: '';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--include "stubs/headers.html"-->
		<title>Picocon 31 - ICSF</title>
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
				margin: 5px auto;
				padding: 8px;
				background: rgba(128,240,64,0.5);
				border-radius: 8px;
				text-align: center;
				width: 220px;
			}
			#buy a:first-child { font-size: 1.5em; padding-bottom: 5px; }
		</style>
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo $protocol; ?>://<?php echo $host; ?><!--SRVROOT-->/picocon/" />
		<meta property="og:title" content="Picocon 31: 'Survival'" />
		<meta property="og:description" content="Picocon 31 will be on the 22nd Feburary 2014, with Sarah Pinborough, Charles Stross, and Professor David Southwood. Picocon is a small London convention hosted at each year Imperial College." />
		<meta property="og:image" content="<?php echo $protocol; ?>://<?php echo $host; ?><!--SRVROOT-->/picocon/images/picocon31.png" />

		<meta property="twitter:card" content="summary_large_image" />
		<meta property="twitter:site" content="@picocon" />
		<meta property="twitter:creator" content="@picocon" />
		<meta property="twitter:title" content="Picocon 31: 'Survival' - 22nd Feburary" />
		<meta property="twitter:description" content="Picocon is the annual one-day Science Fiction &amp; Fantasy convention
			run by the Imperial College Science Fiction and Fantasy Society, ICSF.
			It usually takes place on a Saturday in February, in Imperial
			College's Student Union. This year's guests are Sarah Pinborough, Charles Stross, and Professor David Southward." />
		<meta property="twitter:image:src" content="<?php echo $protocol; ?>://<?php echo $host; ?><!--SRVROOT-->/picocon/images/picocon31.png" />

		<script async="async" defer="defer" src="//connect.facebook.net/en_GB/all.js#appId=269862736478026" /></script>
		<script async="async" defer="defer" src="//platform.twitter.com/widgets.js" /></script>
	</head>
	<body>
		<h1>
			<a href="<!--SRVROOT-->/">
				<img id="logo" src="<!--SRVROOT-->/resources/logo.png" alt="ICSF Logo" />
			</a>
			Picocon 31
			<span id="subtitle">22nd February 2014</span>
		</h1>

		<nav>
			<!--include "stubs/nav-main.html"-->
			<hr />
			<a href="#buy">Buy Tickets</a>
			<a href="#goh">Guests</a>
			<a href="#timetable">Timetable</a>
			<a href="#prices">Prices</a>
			<a href="#directions">Directions</a>
			<a href="#contact">Contact Us</a>
		</nav>

		<p style="font-variant: small-caps; font-size: 16pt; text-align: center;">
			Picocon 31 will be held on Saturday 22th February 2014,
			in Imperial College Union.
		</p>

		<div id="buy">
			<a  href="https://www.imperialcollegeunion.org/shop/club-society-project-products/science-fiction-and-fantasy-products/4684/picocon-tickets">Buy Tickets Online</a>
			<br/>
			(<a href="https://www.imperialcollegeunion.org/shop/club-society-project-products/science-fiction-and-fantasy-products/4683/picocon-tickets---icsf-members">Tickets for ICSF Members</a>)
		</div>

		<h2>What is Picocon?</h2>
		<p>
			Picocon is the annual one-day Science Fiction &amp; Fantasy convention
			run by the Imperial College Science Fiction and Fantasy Society, ICSF.
			It usually takes place on a Saturday in February, in Imperial
			College's Student Union.
			We try not to clash with other conventions around the same time.
		</p>
		<p>
			It is a small (hence the name), affordable and convenient convention
			for students and fans in or near London.
			Registration opens at 10am, with the first scheduled events kicking
			off at around 10:30.
			The schedule concludes in the evening.
		</p>
		<p>
			At a Picocon you will encounter:
		</p>

		<ul>
		<li>Guests of Honour doing talks and panels</li>
			<li>The Destruction of Dodgy Merchandise, typically using liquid nitrogen and an enormous hammer. (You're welcome to bring along donations!)</li>
			<li>Stalls selling books, ICSF t-shirts, and other stuff</li>
			<li>Quiz and silly games</li>
			<li>Student Union bar</li>
		</ul>

		<div style="height: 30px;">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.union.ic.ac.uk/scc/icsf/picocon/" data-text="" data-via="picocon" data-hashtags="picocon31">Tweet</a>
			<div class="fb-like" data-href="https://www.union.ic.ac.uk/scc/icsf/picocon/" data-send="true" data-width="380" data-show-faces="false"></div>
		</div>

		<h2 id="goh">Guests of Honour</h2>
		<div class="columns">
			<div class="no-break clear">
				<h3>Sarah Pinborough</h3>
				<img class="hang-left" width=150 height=150 alt="Sarah Pinborough" src="images/pinborough.jpg" />
				<p>
					Sarah Pinborough is an English-born horror writer whose
					books have found success in the United States.
					Her works have previously been compared to that of
					Bentley Little, Richard Laymon and Dean Koontz.
				</p>
				<p><a href="http://sarahpinborough.com">Sarah's Website</a></p>
			</div>
			<div class="no-break clear">
				<h3>Charles Stross</h3>
				<img class="hang-left" width=150 height=150 alt="Charles Stross" src="images/stross.jpg" />
				<p>
					Charlie Stross is a British writer of science fiction,
					Lovecraftian horror, and fantasy.
					He was born in Leeds and specialises in hard science
					fiction and space opera.
				</p>
				<p><a href="http://www.antipope.org/charlie/">Charles' Website</a></p>
			</div>
			<div class="no-break clear">
				<h3>Professor David Southwood</h3>
				<img class="hang-left" width=150 height=150 alt="David Southwood" src="images/southwood.jpg" />
				<p>
					British space scientist and current President of the
					Royal Astronomical Society, Professor David Southwood
					is as Senior <abbr title="Research Investigator">RI</abbr>
					at Imperial with interests have been in solar–terrestrial
					physics and planetary science, including building the
					magnetic field instrument for the Cassini Saturn orbiter.
				</p>
			</div>
		</div>

		<h2 id="timetable">Timetable</h2>
		<table>
			<tbody>
				<tr>
					<td><time datetime="2014-02-22T10:00Z">10:00</time></td>
					<td>Doors Open</td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T10:30Z">10:30</time></td>
					<td>Charles Stross</td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T11:30Z">11:30</time></td>
					<td>Sarah Pinborough</td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T12:30Z">12:30</time></td>
					<td>
						Destruction Of Dodgy Merchandise<br />Lunch
					</td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T14:00Z">14:00</time></td>
					<td>Prof. David Southwood</td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T15:00Z">15:00</time></td>
					<td>Guest of Honour Panel <p class="note">with Charles Stross, Sarah Pinborough, and Professor David Southwood</p></td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T16:00Z">16:00</time></td>
					<td>Turkey Readings <p class="note">and other abominations</p></td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T16:30Z">16:30</time></td>
					<td>Silly Games <p class="note">Just a Minute, Mornington Crescent, and other favourites</p></td>
				</tr>
					<td><time datetime="2014-02-22T17:30Z">17:30</time></td>
					<td>Harmless Fun</td>
				</tr>
				<tr>
					<td><time datetime="2014-02-22T18:00Z">18:00</time></td>
					<td>Pub Quiz</td>
				</tr>
			</tbody>
		</table>

		<p><strong>The timetable is liable to change up to the start of the convention.</strong></p>

		<h2 id="prices">Prices</h2>

		<p>
			Entry for the day will cost (subject to change up to Feb 2014):
		</p>
		<ul>
			<li><b>&#x00A3;5</b> for ICSF members;</li>
			<li><b>&#x00A3;8</b> concessions (with valid ID) - students/DWP/OAP/children;</li>
			<li><b>&#x00A3;10</b> full price;</li>
			<li><b>FREE</b> for past Guests of Honour.</li>
		</ul>
		<p>
			Discounts for large parties (e.g. other University SF societies)
			are potentially available
			(email the <a href="mailto:picocon@icsf.co.uk">Picocon Sofa</a>).
		</p>
		<p>
			Please note that neither ICSF nor Union membership is required to attend Picocon;
			all are welcome.
		</p>

		<h2 id="directions">Directions to Picocon</h2>
		<p>
			Here's a general <a href="http://g.co/maps/7ahv7">map of the area</a>,
			pointing at the entrance to Beit Quad (which houses the
			Union) off Prince Consort Road.
		</p>
		<div class="columns" style="margin: 1em 0;">
			<div class="no-break clear">
				<h3>By London Underground</h3>
				<img src="<!--SRVROOT-->/resources/tfl/underground.svg" width="80" height="65" alt="London Underground" class="hang-left" />
				<p>
					The tube is probably easiest way to get to Picocon; both
					Gloucester Road Station and South Kensington Station are
					within easy reach.
				</p>
				<p>
					Both stations are served by the
					<span class="tube-line" style="background-color: rgba(255,209,0,0.8);">Circle</span>,
					<span class="tube-line" style="background-color: rgba(0, 114, 41, 0.8);">District</span>, and
					<span class="tube-line" style="background-color: rgba(0, 25, 168, 0.8);">Piccadilly</span>
					lines.
				</p>
				<p>
					These maps show the routes we suggest from both
					<a href="http://g.co/maps/ne7kr">Gloucester Road Station</a>
					and from
					<a href="http://g.co/maps/akrjw">South Kensington Station</a>.
				</p>
				<p>
					N.B.
					Most London tube closures are scheduled at weekends.
					We will provide information on planned closures here once
					it is available from Transport for London.
				</p>
			</div>
			<div class="no-break clear">
				<h3>By Public Bus</h3>
				<img src="<!--SRVROOT-->/resources/tfl/buses.svg" width="80" height="65" alt="TfL Buses" class="hang-left" />
				<p>
					Both the
					<a href="http://www.tfl.gov.uk/tfl/gettingaround/maps/buses/pdf/royalalberthall-12445.pdf">Royal Albert Hall</a>
					and the
					<a href="http://www.tfl.gov.uk/tfl/gettingaround/maps/buses/pdf/southkensington-2236.pdf">South Kensington</a>
					bus stop groups are near by - the Royal Albert Hall itself
					is next door to the Union.
					From South Kensington stops, follow the route map from
					<a href="http://g.co/maps/akrjw">South Kensington Station</a>.
				</p>
				<p>
					These stop are served by buses
					C1, 9, 10, 49, 52, 70, 74,
					345, 360, 414, 430, and 452.
				</p>
			</div>
			<div class="no-break clear">
				<h3>By &lsquo;Boris&rsquo;/&lsquo;Barclays&rsquo; Bike</h3>
				<img src="<!--SRVROOT-->/resources/tfl/cycle-hire.svg" width="80" height="66" alt="Barclay's Bike Hire" class="hang-left" />
				<p>
					There are three hire cycle docking stations on Prince
					Consort Road, which also houses the Union.
					Search for 'SW7 2BB' on the
					<a href="https://web.barclayscyclehire.tfl.gov.uk/maps">Cycle Map</a>.
				</p>
			</div>
		</div>
		<p>
			<b>Note:</b> If you get lost around South
			Kensington trying to find Beit Quad, ask for directions to the
			Royal Albert Hall, and once there, Beit Quad is the building
			on the left of the RAH as you face it's main entrance
			(if you arrive form the Hyde Park side, you will be at the
			rear of the RAH).
		</p>

		<h2 id="contact">Contact Us</h2>
		<p>
			For more information, please contact <b>Amanda Sjödahl</b>,
			the Picocon Sofa (comfier than a chair), at
			<a class="sans" href="mailto:picocon@icsf.org.uk">picocon@icsf.org.uk</a>.
		</p>
		<p>Our mail address is the following:</p>
		<blockquote>
			ICSF<br />
			Student Activities Centre<br />
			Imperial College Students' Union<br />
			Beit Quad<br />
			Prince Consort Road<br />
			SW7 2BB London<br />
			UK
		</blockquote>

		<footer>
			<p>
				The first Picocon was in 1984.
				If you're curious, we have a record of <a href="<!--SRVROOT-->/history/">Picocons of years gone by</a>.
			</p>
			<p class="copyright">Imperial College Science Fiction Society</p>
		</footer>

	</body>
</html>
