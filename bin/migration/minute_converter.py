import os

directory = "../../src/committee/minutes/2019-20/"

# +
header_in = """<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/scc/icsf/resources/style.css" />
		<link href="//fonts.googleapis.com/css?family=Lora|Alice" rel="stylesheet" type="text/css" />
		<link rel="icon" href="/scc/icsf/resources/logo.png" />
		<title>"""

header_in_two = """</title>
		<link rel="stylesheet" type="text/css" href="/scc/icsf/resources/minutes.css" />
	</head>
	<body>
		<h1>
			<a id="logo" href="/scc/icsf/">
				<img src="/scc/icsf/resources/logo.png" alt="ICSF Logo" width="93" height="60" />
			</a>
			ICSF
			<span id="subtitle">
			Minutes
			</span>
		</h1>

		<nav> <!-- Navbar stuff; move along -->
			<a href="/scc/icsf/">Home</a>
			<a href="/scc/icsf/events/">Events</a>
			<a href="/scc/icsf/library/">Library</a>
			<a href="/scc/icsf/committee/">Committee</a>
			<a href="/scc/icsf/publications/">Publications</a>
			<a href="/scc/icsf/picocon/">Picocon</a>
			<a href="/scc/icsf/social/quotes/">Quotes</a>
			<a href="/scc/icsf/social/gallery/">Gallery</a>
			<a href="/scc/icsf/history/">History</a>
			<!-- <a href="/scc/icsf/steampunk/">Steampunk</a>-->
			<hr />
			<a href="/scc/icsf/committee/minutes/">Meetings</a>
			<a href="/scc/icsf/committee/#constitution">Constitution</a>
		</nav>"""

header_out = """<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
	<head>
		<!--include "stubs/headers.html"-->
		<title>"""
header_out_two = """</title>
		<link rel="stylesheet" type="text/css" href="/resources/minutes.css" />
	</head>
	<body>
		<!--include "stubs/h1-start.html"-->
			Minutes
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
			<hr />
			<a href="<!--SRVROOT-->/committee/minutes/">Meetings</a>
			<a href="<!--SRVROOT-->/committee/#constitution">Constitution</a>
		</nav>"""

footer_in = """		<footer>
			<p class="copyright">
			Imperial College Science Fiction Society. Please report issues to
			<a href="mailto:icsf.techpriest@gmail.com">icsf.techpriest@gmail.com</a>
			</p>
		</footer>"""
footer_out = """		<!--include "stubs/footer.html"-->"""
# -

for fname in os.listdir(directory):
    fpath = os.path.join(directory, fname)
    with open(fpath, "r") as f:
        contents = f.read()
    contents = contents.replace(header_in, header_out)
    contents = contents.replace(header_in_two, header_out_two)
    contents = contents.replace(footer_in, footer_out)
    with open(fpath, "w") as f:
        f.write(contents)

print(contents)


