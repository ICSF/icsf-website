Source Code for a Proposed new Website for ICSF
===============================================

NB. This project is not (currently) endorsed by ICSF

Configuring
-----------

This website is designed for high levels of portability without having to rely
on using relative paths everywhere to keep links consistent. Instead, the
website is built from the source code using information about where it will be
deployed to.

You can set up this build process by running the 'configure' script in the
top-level directory of the repository.

```$ ./configure ```

More information on values for the configure script can be found in
configurations.md

Structure
---------

The code is divided into a number of folders

 - ```src``` - The source files for website content
 - ```stubs``` - Shorter bits of source for templates, that should never directly be deployed
 - ```etc``` - Misc configuration files (Makefile template, list of files to exclude when deploying)
 - ```bin``` - Scripts for use in the build process
 - ```build``` - Build output

Building
--------

Building the website is the process of taking the information in ```src```,
and transforming it into webpages servable from your deployment server.
Work that is done includes:

 - Expanding include directives
 - Substituting variables (such as the path to the site)
 - Generating specific index pages

The configure script generates a makefile based on the template in ```etc/```
and the information you gave it.
Below are the main make commands

 - ```make build``` - Update the build directory (is default for jsut ```make```)
 - ```make tidy``` - Remove files in build that would no longer be created by ```make build```
 - ```make clean``` - Remove all content in the ```build``` directory
 - ```make deploy``` - Push the content of ```build``` to the server
 - ```make all``` - Alias for ```make build && make deploy```

Two variables are used by make in this step:

 - ```SRVROOT``` - The path to the website on the webserver
 - ```MODPHP``` - Whether to expect mod_php (or equivalent) - set to 0 to use PHP as a CGI script

Deployment
----------

Deployment is done (by defulat) using ```rsync```, so deployments
can be made by any method that it supports.
The Make variables, and their defualt values, are:

 - ```SYNC = rsync``` - Use rsync to perform deployment
 - ```SYNCPERMS = --perms --chmod=a=rX,u+w,Da+x``` - Permissions to set (see permissions below)
 - ```SYNCEXCLUDE = etc/exclude``` - File containing list of files to not syncronise
 - ```SYNCDEL=--delete-after``` - Remote file deletion policy
 - ```SYNCFLAGS=-rlt $(SYNCPERMS) $(SYNCDEL) --exclude-from=$(SYNCEXCLUDE) --progress```

```-r``` tells rsync to work recursively, ```-t``` makes it preserve file modifications times
and ```-l``` makes it handle symbolic links sensibly.
The target is ```$(DOCROOT)```, which is set up with the configure script.

Permissions
-----------

The ```SYNCPERMS``` makefile variable may at first seem rather daunting, but it's
really just a series of chmod commands.

```SYNCPERMS = --perms --chmod=a=rX,u+w,Da+x```

```a=rX``` - Allow everyone to read files and, if they are executable in ```build```,
then allow everyone to execute them. Otherwise, they are not executable, nor are they
wrtiable by anyone. This is set because most webserver access files by running as a
user that is neither the owner nor a member of the group to which the files belong.

```u+w``` - Allow us (the user) write access to the file. This allows us to update it
later on. If you're deploying to a group webspace, you may prefer ```ug+w```, which
allows members of the group to write too. On other systems, this will cause things to
break (for example, suexec won't run CGI scripts that are group writable).

```Da+x``` - Directories are exeutable by everyone. For a directory, being executable
means that up can open it; the read flag on a directory means that you can get a list
of contents (and is only useful if you already have +x)

Structural TODOs
----------------

 - makefile to not include readme.md files (so they can be used for comments)

Structural Ideas
----------------

 - Have the building step validation CSS and HTML files
