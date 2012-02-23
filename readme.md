Source Code for the Website of the Imperial College Science Fiction Society
===========================================================================

Building
--------

This website is designed for high levels of portability without having to rely
on using relative paths everywhere to keep links consistent. Instead, the
website is built from the source code, and then deployed to your web-server.

You can set up this build process by running the 'configure' script in the
top-level directory of the repository.

```	$ ./configure ```

This asks you two questions - where on the file system to deploy the website
to, and what path it will have on the web.

Once this is done, you can deploy the website using Make

```$ make ```

Editing
-------

The source of the website can be found in the src/ directory.

Structural TODOs
----------------

 - makefile to not include readme.md files (so they can be used for comments)

Structural Ideas
----------------

 - Have the building step validation CSS and HTML files
 - minify CSS before deploying

Content TODOs
-------------

 - Contact the committee list about this project
 - Work out what stuff we want to keep
 - Put together the committee page

