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
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/scc/icsf/resources/style.css" />
		<link href="//fonts.googleapis.com/css?family=Lora|Alice" rel="stylesheet" type="text/css" />
		<link rel="icon" href="/scc/icsf/resources/logo.png" />
		<title>Picocon 35 - ICSF</title>
		<style type="text/css">
			@font-face
			{
			    font-family: "Johnston";
			    src: url(/scc/icsf/resources/London-Tube.ttf);
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
		<!-- <meta itemprop="image" content="<?php echo $protocol; ?>://<?php echo $host; ?>/scc/icsf/picocon/images/picocon31.png" /> -->
		<meta itemprop="startDate" content="2016-02-20T10:00:00Z" />
		<meta itemprop="endDate" content="2016-02-20T20:00:00Z" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo $protocol; ?>://<?php echo $host; ?>/scc/icsf/picocon/" />
		<meta property="og:title" content="Picocon 34: 'Origins'" />''
		<meta property="og:description" content="Picocon 35 will be on the 17th of February 2018. Picocon is a small London convention hosted at each year at Imperial College." />
		<meta property="og:image" content="<?php echo $protocol; ?>://<?php echo $host; ?>/scc/icsf/picocon/images/picocon33.png" />

		<meta property="twitter:card" content="summary_large_image" />
		<meta property="twitter:site" content="@picocon" />
		<meta property="twitter:creator" content="@picocon" />
		<meta property="twitter:title" content="Picocon 35: 'Harmony' - 17th Feburary" />
		<meta property="twitter:description" content="Picocon is the annual Science Fiction &amp; Fantasy convention
			run by the Imperial College Science Fiction and Fantasy Society, ICSF.
			It usually takes place on a Saturday in February, in Imperial
			College's Blackett Building." />
		<meta property="twitter:image:src" content="<?php echo $protocol; ?>://<?php echo $host; ?>/scc/icsf/picocon/images/picocon33.png" />

		<script async="async" defer="defer" src="//connect.facebook.net/en_GB/all.js#appId=269862736478026"></script>
		<script async="async" defer="defer" src="//platform.twitter.com/widgets.js"></script>
	</head>
	<body>
		<h1>
			<a href="/scc/icsf/">
				<img id="logo" src="/scc/icsf/resources/logo.png" alt="ICSF Logo" />
			</a>
			<span itemprop="name">Picocon 35 &mdash; &lsquo;Harmony&rsquo;</span>
			<span id="subtitle">17th February 2018</span>
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
			<a href="/scc/icsf/history/">History</a>	<hr />
			<!--** <a href="https://www.imperialcollegeunion.org/shop/club-society-project-products/science-fiction-and-fantasy-products/15840/picocon-34-ticket">Buy Tickets</a> **-->
			<a href="#goh">Guests</a>
			<a href="#timetable">Timetable</a>
			<a href="#prices">Prices</a>
			<a href="#directions">Directions</a>
			<a href="#contact">Contact Us</a>
		</nav>

		<p style="font-variant: small-caps; font-size: 16pt; text-align: center;">
			<span itemprop="alternateName">Picocon 35</span>
			will be held on
			Saturday 17th February 2018,
			in Imperial College's Blackett Building.
		</p>

		<h2>What is Picocon?</h2>
		<!--<div class="columns">-->
		<div itemprop="description">
		<p>
			Picocon is the annual Science Fiction &amp; Fantasy convention
			run by the Imperial College Science Fiction and Fantasy Society, ICSF.
			It usually takes place on a Saturday in February, in Imperial
			College&apos;s Blackett Building.
			We try not to clash with other conventions around the same time.
		</p>
		<p>
			It is a small (hence the name), affordable and convenient convention
			for students and fans in or near London.
			Registration opens at 9am, with the first scheduled events kicking
			off at around 9:30.
			The schedule concludes in the evening.
		</p>
		<p>
			At a Picocon you will encounter:
		</p>

		<ul>
		<li>Guests of Honour doing talks and panels</li>
			<li>The Destruction of Dodgy Merchandise, typically with liquid nitrogen and an enormous hammer. (Donations welcome!)</li>
			<li>Stalls selling books, ICSF t-shirts, and other stuff</li>
			<li>Quiz and silly games</li>
			<li>h bar</li>
		</ul>
		<!--** </div>

		<img src="picocon34_bw.png" style="display: block; max-width: 80%; max-height: 400px; margin: 5px auto;" alt="Picocon 34 logo" />
		</div> **-->

		<!--<div style="height: 30px;">-->
		<div style="text-align:center">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.union.ic.ac.uk/scc/icsf/picocon/" data-text="" data-via="picocon" data-hashtags="picocon32">Tweet</a>
			<div class="fb-like" data-href="https://www.union.ic.ac.uk/scc/icsf/picocon/" data-send="true" data-width="380" data-show-faces="false"></div>
		</div>

		<!-- <h2 id="goh">Guests of Honour</h2>
                <p>Speaking at Picocon 34 this year will be:</p>
		<div class="columns">
		<ul>
			<li><a href="https://www.jainefenn.com/">Jaine Fenn</a> is the author of numerous published short stories and the Hidden Empire series of character-driven Space Opera novels. After studying linguistics and astronomy her first career was in IT, an experience which has left her with a distrust of technology unusual in an SF author. She was originally a guest at Picocon in 2009, shortly after the first Hidden Empire book, Principles of Angels, came out from Gollancz.   </li> <img src="fenn.jpg" style="max-width: 20%; max-height: 400px; margin: 5px auto;" alt="Jaine Fenn"/>
			<li><a href="http://www.unlikelyworlds.co.uk/">Paul McAuley</a> , one of the most widely-praised authors in British science fiction, has published more than twenty novels, over a hundred short stories, and a BFI Film Classic monograph on Terry Gilliam’s film Brazil. His fiction has been nominated for numerous prizes and has won the Arthur C. Clarke Award, the Philip K Dick Memorial Award, and many others. After working as a research biologist and university lecturer in botany, he is now a full-time writer. </li> <img src="mcauley.jpg" style="max-width: 20%; max-height: 400px; margin: 5px auto;" alt="Paul McAuley" />
			<li><a href="http://www.allumination.co.uk/">Al Robertson</a> is a writer, poet, and marketer,  whose first novel ,'Crashing Heaven, came out last June. His second novel, ‘Waking Hell’, was released last October with Gollancz. He's been publishing SF, fantasy and horror stories and novellas for the last ten years or so - these have appeared in Interzone, Black Static, Postscripts and elsewhere. </li> <img src="robertson.JPG" style="block; max-width: 20%; max-height: 400px; margin: 5px auto;" alt="Al Robertson" />
			<li><a href="http://www.justinarobson.co.uk/">Justina Robson </a>  has spent a lot of her life writing Science Fiction. This has included ten novels, a collection of short stories, and a Transformers book. Her debut novel, Silver Screen, was shortlisted for the Arthur C Clarke award and the BSFA award. She currently lives in Leeds. </li> <img src="robson.JPG" style="block; max-width: 20%; max-height: 400px; margin: 5px auto;" alt="Justina Robson" />
			<li>and <a href=http://youtube.com/ashens>Stuart Ashen</a> presenting the Destruction of Dodgy Merchandise</li>
		</ul>
		</div> -->

		<div class="columns">
			<div class="no-break">
				<h2 id="timetable">Provisional Timetable</h2>
				<!--for two-day Picocons--><!--	<h3>Saturday</h3>-->
					<table>
						<tbody>
							<tr>
								<td>9:00</td>
								<td>Front Desk/registration opens</td>
							</tr>
							<tr>
								<td>09:30</td>
                                <td rowspan=2>Author&apos;s Talk <!-- - Jaine Fenn --></td>
							</tr>
							<tr>
								<td>10:00</td>
							</tr>
							<tr>
								<td>10:30</td>
								<td rowspan=2>Author&apos;s Talk <!-- - Paul McAuley --></td>
							</tr>
							<tr>
								<td>11:00</td>
							</tr>
							<tr>
								<td>11:30</td>
								<td rowspan=2>Author&apos;s Talk <!-- - Al Robertson --></td>
							</tr>
							<tr>
								<td>12:00</td>
							</tr>
							<tr>
								<td>12:30</td>
								<td rowspan=3>Lunch<br/><br/>Destruction of Dodgy Merchandise (starts 13:00)</td>
							</tr>
							<tr>
								<td>13:00</td>
							</tr>
							<tr>
								<td>13:30</td>

							</tr>
							<tr>
								<td>14:00</td>
                <td rowspan=2>Author&apos;s Talk <!-- - Justina Robson --></td>
							</tr>
							<tr>
								<td>14:30</td>

							</tr>
							<tr>
								<td>15:00</td>
                <td rowspan=2>Authors&apos; Panel</td>
							</tr>
							<tr>
								<td>15:30</td>

							</tr>
							<tr>
								<td>16:00</td>
								<td rowspan=3>Turkey Readings<br/><br/>Silly Games</td>
							</tr>
							<tr>
								<td>16:30</td>
							</tr>
							<tr>
								<td>17:00</td>
							</tr>
							<tr>
								<td>17:30</td>
                <td>Harmless Fun (<em>definitely not a fish duel</em>)</td>
							</tr>
							<tr>
								<td>18:00</td>
								<td rowspan=2>Pub quiz (with authors leading teams!)</td>
							</tr>
							<tr>
								<td>18:30</td>
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
					Entry<!-- for one day-->:
				</p>
				<ul>
					<li><b>&#x00A3;8</b> for ICSF members;</li>
					<li><b>&#x00A3;10</b> concessions (with valid ID) - students/DWP/OAP/children;</li>
					<li><b>&#x00A3;12</b> full price;</li>
					<li><b>FREE</b> for past Guests of Honour.</li>
				</ul>
				<!-- for two-day years--><!--<p>
					Entry for both days:
				</p>
				<ul>
					<li><b>&#x00A3;15</b> for ICSF members;</li>
					<li><b>&#x00A3;18</b> concessions (with valid ID) - students/DWP/OAP/children;</li>
					<li><b>&#x00A3;20</b> full price;</li>
					<li><b>FREE</b> for past Guests of Honour.</li>
				</ul>-->
                <!--<p>You can buy tickets <a href="https://www.imperialcollegeunion.org/shop/club-society-project-products/science-fiction-and-fantasy-products/12251/picocon-33-tickets">here</a>.-->
				<p>
					Discounts for large parties (e.g. other University SF societies)
					are potentially available
					(email the <a href="mailto:picocon@icsf.co.uk">Picocon Sofa</a>).
				</p>
				<p>
					Please note that neither ICSF nor Union membership is required to attend Picocon;
					all are welcome.
				</p>
			</div>
			<div class="no-break">
				<h2 id="menu">Fast-track lunch menu</h2>
				<p>Food will be served between 12:30-13:30 in h-bar. </p>
				<!-- <ul>
					<li>Beef Burger &amp; Chips -£4.75</li>
					<li>Chicken Burger &amp; Chips - £4.80</li>
					<li>Vege Burger &amp; Chips - £4.25</li>
					<li>Mediterranean roasted vegetable &amp; tomato pasta - £3.95</li>
				</ul>
				<p>Please note, anyone purchasing any other items from the menu will need to wait as normal as these will be prepared in the main kitchen.</p>
				-->
</div>
		</div>

		<h2 id="directions">Directions to Picocon</h2>
		<p>
			Here&apos;s a general <a href="http://g.co/maps/7ahv7">map of the area</a>,
			pointing at the entrance to Beit Quad (which houses the
			Union) off Prince Consort Road.
		</p>
		<div class="columns" style="margin: 1em 0;">
			<div class="no-break clear">
				<h3>By London Underground</h3>
				<img src="/scc/icsf/resources/tfl/underground.svg" width="80" height="65" alt="London Underground" class="hang-left" />
				<p>
					The tube is probably easiest way to get to Picocon; both
					Gloucester Road Station and South Kensington Station are
					within easy reach.
				</p>
				<p>
					Both stations are served by the
					<span class="tube-line" style="background-color: rgba(255,209,0,0.8);">Circle</span>,
					<span class="tube-line" style="background-color: rgba(0, 114, 41, 0.8);">District</span>, and
					<span class="tube-line" style="background-color: rgba(0, 25, 168, 0.8); color: #eee">Piccadilly</span>
					lines.
					There are
					<strong>
						<a href="http://www.tfl.gov.uk/tfl/livetravelnews/realtime/track.aspx?offset=<?=$days_to_picocon;?>" target="map">planned engineering works</a>
						on some other Underground lines
					</strong>.
				</p>
				<p>
					These maps show the routes we suggest from both
					<a href="http://g.co/maps/ne7kr" target="map">Gloucester Road Station</a>
					and from
					<a href="http://g.co/maps/akrjw" target="map">South Kensington Station</a>.
				</p>
			</div>
			<!--<div class="center">
				<form action="http://journeyplanner.tfl.gov.uk/user/XSLT_TRIP_REQUEST2" id="jpForm" method="post" target="tfl">
					<h2 style="color:#244266">TfL Journey Planner</h2>
					<input type="hidden" name="language" value="en" />
					<input type="hidden" name="execInst" value="" />
					<input type="hidden" name="sessionID" value="0" />
					<input type="hidden" name="ptOptionsActive" value="-1" />
					<input type="hidden" name="name_destination" value="SW7 2BB" />
					<input type="hidden" name="type_destination" value="locator" />
					<input type="hidden" name="place_destination" value="London" />
					<input type="hidden" name="itdTripDateTimeDepArr" value="arr" />
					<input type="hidden" name="itdDate" value="20150214" />
					<input type="hidden" name="itdTimeHour" value="10" />
					<input type="hidden" name="itdTimeMinute" value="00" />

					<div style="padding: 0 15px">
						<input type="text" name="name_origin" placeholder="From" />
						<select name="type_origin">
							<option value="stop">Station or stop</option>
							<option value="locator">Postcode</option>
							<option value="address">Address</option>
							<option value="poi">Place of interest</option>
						</select>
						<input type="hidden" name="place_origin" value="London" />
					</div>

					<a style="display: block;" target="tfl"
						href="//journeyplanner.tfl.gov.uk/user/XSLT_TRIP_REQUEST2?language=en&amp;ptOptionsActive=1"
						onclick="var x = document.getElementById('jpForm'); x.ptOptionsActive.value='1';x.execInst.value='readOnly';x.submit(); return false">
						More options
						<img src="//www.tfl.gov.uk/tfl-global/images/options-icons.gif" alt="More Options" />
					</a>

					<input type="submit" title="Plan your Journey" value="Plan your Journey"/>
				</form> 
			</div> -->
			<div class="no-break clear">
				<h3>By Public Bus</h3>
				<img src="/scc/icsf/resources/tfl/buses.svg" width="80" height="65" alt="TfL Buses" class="hang-left" />
				<p>
					Both the
					<a href="http://www.tfl.gov.uk/gettingaround/maps/buses/pdf/royalalberthall-a4.pdf" target="map">Royal Albert Hall</a>
					and the
					<a href="http://www.tfl.gov.uk/gettingaround/maps/buses/pdf/southkensington-a4.pdf" target="map">South Kensington</a>
					bus stop groups are near by - the Royal Albert Hall itself
					is next door to the Union.
					From South Kensington stops, follow the route map from
					<a href="//g.co/maps/akrjw" target="map">South Kensington Station</a>.
				</p>
				<p>
					These stops are served by buses
					C1, 9, 10, 49, 52, 70, 74,
					345, 360, 414, 430, and 452.
				</p>
			</div>
			<div class="no-break clear">
				<h3>By Bike</h3>
				<img src="santander.jpg" width="80" height="80" alt="Santander Bike Hire" class="hang-left" />
				<p>
					There are three hire cycle docking stations on Prince
					Consort Road, which also houses the Union.
					Search for 'SW7 2BB' on the
					<a href="https://web.barclayscyclehire.tfl.gov.uk/maps">Cycle Map</a>.
				</p>
			</div>
			<div>
			<script>(function(w){w.to='Beit+Quadrangle,+Imperial+College+Road,+London+SW7+2BB,+UK';w.url='https://tfl.gov.uk'; return w; })(window.tfl = window.tfl || {});</script><script src='https://tfl.gov.uk/cdn/static/scripts/specific/widgets/jp-widget.js'></script>
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
			For more information, please contact <b>Edward da Fonseca</b>,
			the Picocon Sofa (comfier than a chair), at
			<a class="sans" href="mailto:picocon@icsf.org.uk">picocon@icsf.org.uk</a>.
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

		<footer>
			<p>
				The first Picocon was in 1984.
				If you&apos;re curious, we have a record of <a href="/scc/icsf/history/">Picocons of years gone by</a>.
			</p>
			<p class="copyright">Imperial College Science Fiction Society</p>
		</footer>

	</body>
</html>
