<?php
	$error = null;

	if (count($_POST) > 0) {
		require("config.php");

		if (empty($_POST['name']) || empty($_POST['email'])) {
			$error = 'Name and email are required fields';
			goto err;
		}

		if (empty($_POST['group'])) {
			$error = 'Please make note of your membeship type';
			goto err;
		}

		$defaults = array(
			'contact' => false,
			'contact_all' => false,
			'ff_1' => null,
			'ff_2' => null,
			'ff_3' => null,
			'ff_4' => null,
			'ff_5' => null,
			'ww' => false,
			'rpg' => false,
			'email' => null,
			'name' => null,
			'group' => null,
			'aff' => null,
			'film' => null
		);

		foreach ($_POST as $k=>$v)
		{
			if (false===array_key_exists($k, $defaults))
				die('Unexpected key ' . $k);
		}

		$data = array_merge($defaults, $_POST);
		array_walk($data, function(&$v, $k) {
			if ($v === 'on')
				$v = 1;
			if (is_string($v))
				$v = '"' . mysql_real_escape_string($v) . '"';
			if ($v === null)
				$v = 'null';
			if (is_bool($v))
				$v = $v ? '1' : '0';
		});

		mysql_connect('localhost', 'scc_icsf', $password) or die('conenct failed');
		mysql_select_db('scc_icsf') or die('select db failed');

		$query = 'INSERT INTO picocon_prereg (`' . implode('`, `', array_keys($data)) . '`) VALUES (' . implode(', ', $data) . ')';
		mysql_query($query);
		header('Location: regdone.html', true, 303);
		exit;
	}

err:

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/scc/icsf/resources/style.css" />
		<link href="//fonts.googleapis.com/css?family=Lora|Alice" rel="stylesheet" type="text/css" />
		<link rel="icon" href="/scc/icsf/resources/logo.png" />
		<title>Picocon 32 - Pre-Registration</title>
		<style type="text/css">
			fieldset {
				display: inline-block;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				width: 100%;
				border-radius: 10px;
				margin: 0 0 10px;
				padding: 5px 15px;
			}
			legend { font-size: 16pt; padding: 0 10px; margin: 0 auto; }
			input, label, p, option {
				font-family: 'Open Sans', Helvetica, sans-serif;
				font-size: 14px;
			}
			label { display: block; line-height: 30px; position: relative; padding: 4px 0; margin: 0; }
			input[type=email], input[type=text], select {
				min-width: 200px;
				width: 50%;
				background: rgb(255, 240, 224);
				padding: 5px;
				border-radius: 8px;
				float: right;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
			}
			input[required]:before { content: "*"; color: red; }
			input[type=email]:valid, input[type=text]:valid { background: white; }
			input[type=submit] { margin: 15px auto; width: auto; padding: 10px; display: block; }
			p { margin-top: 0.2em; }
		</style>
	</head>
	<body>
		<h1>
			<a href="/scc/icsf/">
				<img id="logo" src="/scc/icsf/resources/logo.png" alt="ICSF Logo" />
			</a>
			Picocon 32 &mdash; Pre&ndash;registration
			<span id="subtitle">Register Now!</span>
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
			<a href="/scc/icsf/steampunk/">Steampunk</a>			<hr />
			<a href="/scc/icsf/picocon/">Picocon 32</a>
			<a href="/scc/icsf/picocon/#tickets">Buy Tickets</a>
		</nav>

		<form method="post" action="#">

			<!--<h2>REGISTRATION IS CLOSED</h2>-->

			<input  type="submit" value="Submit Pre-Registration" style="float: right; margin: 0" />
			<p>
				Pre-register for <a href="index.php">Picocon 32</a>.
			</p>
			<p>
				Newer browsers should highlight fields they consider invalid in a light peachy-red.
			</p>

		<section class="columns">
		<div>
			<fieldset>
				<legend>Personal Details</legend>

				<label for="name">
					<input  type="text" placeholder="Joe Bloggs" required="required" name="name" id="name" maxlength="128" />
					Your Name:
				</label>
				<label for="email">
					<input  type="email" placeholder="joe@bloggity.com" required="required" name="email" id="email" maxlength="128" />
					Email Address:
				</label>
			</fieldset>

			<fieldset>
				<legend>Your Visit</legend>

				<label for="group">
					Membeship Type:
					<select required="required" name="group" id="group">
						<option value="" disabled="disabled">Please Select</option>
						<option value="full">Full Membership</option>
						<option value="concession">Concession</option>
						<option value="affiilate">Affiliate Society</option>
						<option value="icsf">ICSF Member</option>
						<option value="icsf">IC Union Member</option>
						<option value="goh">(Past) Guest of Honour</option>
						<option value="staff">Convention Staff</option>
					</select>
				</label>
				<label for="aff">
					Group Affiliation:
					<input  name="aff" type="text" id="aff" maxlength="64" />
				</label>
				<p>
					If you are a member of a Society with a reduced entrance agreement,
					select 'Affiliate Society', and put the society's name in the box.
				</p>
				<p>
					Note that proof of your membership status may be requested on the day;
					you may be required to pay for full membership if you are unable to
					provide it.
				</p>
			</fieldset>

			<fieldset>
				<legend>Contacting You</legend>

				<p>
					We'd like to contact you about things going on with Picocon.
					In the short term, this information will focus on ticket availability,
					changes of schedule, and any last-minute information that might
					effect your visit to the convention. You can also take this
					opportunity to subscribe to early notifications of future Picocons.
				</p>

				<label for="contact">
					<input type="checkbox" id="contact" name="contact" checked="checked" />
					Picocon 32
				</label>
				<label for="contact_all">
					<input type="checkbox" id="contact_all" name="contact_all" />
					And future Picocons
				</label>
			</fieldset>
		</div>
		<div>

			<fieldset>
				<legend>Family Fortunes</legend>
				<p>
					Each year, we have a Family Fortunes round in the quiz,
					created from your responses.
					This section isn't required, but we need answers to make
					the quiz work, so take a moment to put down your answers.
				</p>
				<p>Name the first thing which comes to mind for each category</p>

				<p>Name... </p>
				<label for="ff1"><input  type="text" name="ff_1" id="ff1" maxlength="64" />A pair of twins</label>
				<label for="ff2"><input  type="text" name="ff_2" id="ff2" maxlength="64" />A city with an unseen side to it</label>
				<label for="ff3"><input  type="text" name="ff_3" id="ff3" maxlength="64" />Two mortal enemies</label>
				<label for="ff4"><input  type="text" name="ff_4" id="ff4" maxlength="64" />A famous pair of clones</label>
				<label for="ff5"><input  type="text" name="ff_5" id="ff5" maxlength="64" />A character with an evil alternate universe version of themselves</label>
			</fieldset>
		</div>
		</div>
			</fieldset>
				<legend>Cinema!</legend>
				<p>
					This year, we are also having a cinema showing.
					To decide what will be shown, pick from the following:
				</p>
				<input type="radio" name="film" value="The Matrix">The Matrix (1999)</input>
				<input type="radio" name="film" value="A Scanner Darkly">A Scanner Darkly (2007)</input>
				<input type="radio" name="film" value="Coraline">Coraline (2009)</input>
				<input type="radio" name="film" value="They Live">They Live (1988)</input>
				<input type="radio" name="film" value="Pans Labyrinth">Pans Labyrinth (2006)</input>
				<input type="radio" name="film" value="AI">A.I. (2001)</input>
				<input type="radio" name="film" value="Galaxy Quest">Galaxy Quest (1999)</input>
				<input type="radio" name="film" value="Brazil">Brazil (1985)</input>
				<input type="radio" name="film" value="Being John Malkovich">Being John Malkovich (1999)</input>
		</section>
		<input  type="submit" value="Submit Pre-Registration" style="margin: 10px;" />
		</form>
	</body>
</html>
