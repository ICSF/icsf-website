Some Suggested Configurations
=============================

First, it should be noted that some of the pages will currently only
perform as expect when running within Imperial College, as they make
use of ICSF's non-public database API.

Local Apache Server
-------------------

These are the likely defaults configurations for deploying to an Apache
server on the local machines

```DOCROOT=/var/www```

```SRVROOT=```

```MODPHP=1```


IC DoC Webspace
---------------

For members of Imperial's Department of Computing, you cna use part of
your personal web space to test this website. You will need to replace
<user> with your username.

```DOCROOT=/homes/<user>/public_html/icsf```

```SRVROOT=/~<user>/icsf```

```MODPHP=0```

Note that you can remotely deploy to DoC webspace with

```DOCROOT=<user>@shell1.doc.ic.ac.uk:/homes/<user>/public_html/icsf```
