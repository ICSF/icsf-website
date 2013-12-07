Some Suggested Configurations
=============================

First, it should be noted that some of the pages will currently only
perform as expect when running within Imperial College, as they make
use of ICSF's non-public database API.

Local Apache Server
-------------------

These are the likely defaults configurations for deploying to an Apache
server on the local machines

```shell
DOCROOT=/var/www
SRVROOT=
MODPHP=1
```


IC DoC Webspace
---------------

For members of Imperial's Department of Computing, you cna use part of
your personal web space to test this website. You will need to replace
<user> with your username.

```shell
DOCROOT=/homes/<user>/public_html/icsf
SRVROOT=~<user>/icsf
MODPHP=0
```

Note that you can remotely deploy to DoC webspace with

```shell
DOCROOT=<user>@shell1.doc.ic.ac.uk:/homes/<user>/public_html/icsf
```

Union Webserver Dougal
----------------------

This meeds some manual editing of the rsync flags. Add the following
to the Makefile created by ./configure beneath the input for etc/Makefile

```shell
SYNCPERMS=--no-perms --chmod=g+rw,a-x,Da+x
```

This makes sure that rsync doesn't try to set the groups,
makes sure that the sticky bits are set on directories,
and gives the group write access (so future web editors
can continue uploading). The executable bit is entirely
unset, as CGI is not used on Dougal.
