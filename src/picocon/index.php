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
		<title>Picocon 39 - ICSF</title>
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
			<span itemprop="name">Picocon 39 - Apocalypse and Dystopia</span>
			<span id="subtitle">5th March 2022</span>
		</h1>

		<nav>
			<!--include "stubs/nav-main.html"-->
			<hr />
			<a href="https://www.imperialcollegeunion.org/shop/student-groups/429">Buy Tickets</a>
			<a href="#goh">Guests</a>
			<a href="#timetable">Timetable</a>
			<a href="#tickets">Tickets</a>
			<a href="#contact">Contact Us</a>
		</nav>

		<p style="font-variant: small-caps; font-size: 16pt; text-align: center;">
			<span itemprop="alternateName">Picocon 39</span>
			will be held on
			Saturday 5th March, 2022, 
			10am - 6pm @ Blackett LT1,
			online.
		</p>

		<h2>What is Picocon?</h2>
		<div class="columns">
		<div itemprop="description">
		<p>
			Picocon is the annual Science Fiction &amp; Fantasy convention
			run by the Imperial College Science Fiction and Fantasy Society, ICSF.
			We try not to clash with other conventions around the same time.
		</p>
		<!-- <p>
			It is a small (hence the name), affordable and convenient convention
			for students and fans in or near London.
			Events begin at
			around 10:00.
			The schedule concludes in the evening.
		</p> -->
		<p>
			Our annual convention, Picocon 39 will be held this year at 
			10am-6pm on March the 5th in person,
			with the theme of Apocalypse and Dystopia.
		</p>

		<p>
			For those who have not been to a Picocon before we will have
		</p>

		<ul>
			<li>Talks from various authors.</li>
			<li>A variety of charity games across the day, including 
				rebuilding and destroying a cardboard civilization</li>
			<li>A sci-fi and fantasy themed quiz</li>
			<li>A panel discussion by the authors.</li>
			<li>Tabletop society will also be running loads of games 
				for the duration of the day. </li>
		</ul>
    
		<p>
			As it will be held in person we will be limiting attendees to 
			100 and will require evidence of a negative Covid test
			from all attendees. 
		</p>

		</div>
		<!-- <img src="picocon39.jpeg" style="display: block; max-width: 80%; max-height: 400px; margin: 5px auto;" alt="Picocon 39 logo" /> -->
		</div>

		<div style="height: 30px;">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.union.ic.ac.uk/scc/icsf/picocon/" data-text="" data-via="picocon" data-hashtags="picocon38">Tweet</a>
			<div class="fb-like" data-href="https://www.union.ic.ac.uk/scc/icsf/picocon/" data-send="true" data-width="380" data-show-faces="false"></div>
		</div>

		<hr style="width:50%;text-align:centre;border: 1px solid;border-radius:1px">


		<div class="columns">
			<h2 id="goh">Guests of Honour</h2>
                <p>Speaking at Picocon 39 this year will be:</p>

			<h3 style="text-decoration: underline">Bryony Pearce</h3>
			<h4><a href="http://www.bryonypearce.co.uk/" target="_blank">http://www.bryonypearce.co.uk/</a></h4>
			<p>Bryony Pearce is a multi-award-winning novelist working in 
				both the YA and Adult markets. She writes science 
				fiction short stories, adult thrillers and a mixture of 
				young adult dystopia, horror and thrillers. 
				She teaches the course writing for children at City 
				University and has performed at the Edinburgh Literary 
				Festival, The Wychwood Festival, Comicon, YALC, 
				the Sci Fi Weekender, The Just So Festival and 
				a number of other festivals and events. </p>  
			
			<h3 style="text-decoration: underline">Louise Mumford</h3>
			<h4><a href="https://www.louisemumfordauthor.com/" target="_blank">https://www.louisemumfordauthor.com/</a></h4>
			<p>Previously a teacher Louise was discovered as a writer at the
				Primadonna festival 2019. 
				Her debut novel, Sleepless, a “frighteningly inventive” thriller
				inspired by her own insomnia, was published in December 2020 by
				 HQ HarperCollins and became a UK Amazon Kindle bestseller. </p>
				 
			<h3 style="text-decoration: underline">Gareth Powell</h3>
			<h4><a href="https://www.garethlpowell.com/" target="_blank">https://www.garethlpowell.com/</a></h4>
			<p>Gareth Powell is an award winning British Sci-Fi author, most
well known for his two Trilogies Embers of War & Ack-Ack
Macaque. To date he has written and published nine novels, two
short story collections, and has even tried his hand at screenplays and comic.
Gareth has also written freelance for The Guardian amongst
others, and is a regular columnist for The Engineer.</p>
			
			<h3 style="text-decoration: underline">Matthew Wraith</h3>			
			<p>Matthew Wraith is a seasonal lecturer in science fiction, 
			culture and at imperial this includes running the Science Fiction
			 horizons course in first year. Their area of knowledge includes
			  futurism, particularly within science fiction. </p>  
 
			<h4>Joining us online:</h4>

			<h3 style="text-decoration: underline">A.J. Flowers</h3>
			<h4><a href="https://aj-flowers.com/" target="_blank">https://aj-flowers.com/</a></h4>
			<p>A.J. Flowers is a USA Today Bestselling fantasy author based out
				of Detroit. She writes young adult and epic fantasy books as 
				well as post-apocalyptic thrillers under the name Eva Storm.</p>  	

			<h3 style="text-decoration: underline">Brendan Dubois</h3>
			<h4><a href="https://brendandubois.com/" target="_blank">https://brendandubois.com/</a></h4>
			<p>Brendan DuBois is the New York Times bestselling author of 
			twenty-four novels including the dark victory sci fi trilogy. 
			He has won the Shamus Award from the Private Eye Writers of 
			America, two Barry Awards, two Derringer Awards, the Ellery Queen 
			Readers Award, and three Edgar Allan Poe Award nominations 
			from the Mystery Writers of America. </p> 

			<img src="picocon39.jpeg" style="display: block; max-width: 80%; max-height: 400px; margin: 5px auto;" alt="Picocon 39 logo" />

			<div class="no-break">
				<h2 id="timetable">Timetable</h2>
				<!--for two-day Picocons--><!--	<h3>Saturday</h3>-->
					<table>
						<tbody>
							<tr>
								<td>10:00</td>
								<td>Guest Talk 1<br/><i>Bryony Pearce</i></td>
							</tr>
							<tr>
								<td>11:00</td>
								<td>Guest Talk 2<br/><i>Matthew Wraith</i></td>
							</tr>
							<tr>
								<td>11:50</td>
								<td>Guest Talk 3<br/><i>Louise Mumford</i></td>
							</tr>
							<tr>
								<td>12:40</td>
								<td>Guest Talk 3<br/><i>Gareth Powell</i></td>
							</tr>
							<tr>
								<td>13:20 - 15:00</td>
								<td>Lunch, Games, Charity Events</td>
							</tr>
							<tr>
								<td>15:00</td>
								<td>Guest Talk 4<br/><i>A.J. Flowers</i></td>
							</tr>
							<tr>
								<td>16:00</td>
								<td>Panel</td>
							</tr>							
							<tr>
								<td>17:00</td>
								<td>Quiz</td>
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
				<h2 id="tickets">Tickets</h2>

				<p>Tickets for Picocon can be purchased here:</p>
				<a 
				href="https://www.imperialcollegeunion.org/shop/csp/science-fiction-and-fantasy/picocon-39-members-tickets"
				target = "blank_">For Members</a>
				<br>
				<a 
				href="https://www.imperialcollegeunion.org/shop/csp/science-fiction-and-fantasy/picocon-39-tickets-non-members-0"
				target = "blank_">For Non members</a>				
			</div>

			<h2 id="directions">Links to access Picocon</h2>

			<p>Additionally, for those who cannot attend in person we will 
			be streaming the talks. </p>

			<p>All the talks and panel discussion will be streamed live on our 
				<a href="https://www.youtube.com/channel/UC5FNfruFX1GXtIHPwiV0Rrw">Youtube channel</a></p>

			<div class="g-ytsubscribe" data-channelid="UC5FNfruFX1GXtIHPwiV0Rrw"
			 data-layout="full" data-count="hidden" style="min-height: 50px"></div>

			<h2 id="contact">Contact Us</h2>
			<p>
				For more information, please contact <b>Thomas Blore</b>,
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
			<a href="mailto:icsflibrary@gmail.com">icsf.techpriest@gmail.com</a></p>
		</footer>

	</body>
</html>
