TARGETS=$(shell bin/gettargets)
SYNC=rsync
SYNCDEL=--delete-after
SYNCPERMS=--perms --chmod=a=rX,u+w,Da+x
SYNCEXCLUDE=etc/exclude
SYNCFLAGS=-rlc $(SYNCPERMS) $(SYNCDEL) --exclude-from=$(SYNCEXCLUDE) --progress --stats

ifeq ($(shell uname),Darwin)
	XARGS=xargs
else
	XARGS=xargs -r
endif

JAVAC=javac
JAVA=java
SED=sed

.DEFAULT: build
.PHONY: all deploy build clean tidy

# ======= PHONY TARGETS =======

build: $(TARGETS)

all:
	$(MAKE) build
	$(MAKE) deploy

tidy:
	@mkdir -p -v build/
	bin/gettargets | sort -u > targets
	find build -type f | sort -u > current
	comm -2 -3 current targets | $(XARGS) rm -v
	rm targets current
	find build -depth -type d -empty -exec rmdir '{}' \;
	find build -name .DS_Store | $(XARGS) rm

build-dir:
	@mkdir -p -v build/

deploy: tidy
	@mkdir -p -v build/
	$(SYNC) $(SYNCFLAGS) build/. "$(DOCROOT)"

deploy-dry: tidy
	@mkdir -p -v build/
	$(SYNC) $(SYNCFLAGS) --dry-run build/. "$(DOCROOT)"

deploy-noimg: tidy build-dir
	$(SYNC) $(SYNCFLAGS) --exclude 'social' build/. "$(DOCROOT)"

deploy-dry-noimg: tidy build-dir
	$(SYNC) $(SYNCFLAGS) --dry-run --exclude 'social' build/. "$(DOCROOT)"

test:
	SRVROOT="$(SRVROOT)/" bin/validate

clean:
	rm -rf build src/committee/minutes/index.html src/sitemap.xml

# ======= TOOL BUILDING =======

bin/MinifyCss.class : bin/MinifyCss.java bin/CssCompressor.java
	$(JAVAC) $<

# ======= FILE TYPE HANDLERS =======

build/%.html : src/%.html Makefile stubs
	@mkdir -p -v $(@D)
	bin/var-subst $< SRVROOT=${SRVROOT} > $@

build/%.html : build/%.html.php Makefile stubs
	php $< > $@

build/%htaccess : src/%htaccess Makefile stubs
	@mkdir -p -v $(@D)
	bin/var-subst $< SRVROOT=${SRVROOT} > $@

build/%.php : src/%.php Makefile stubs
	@mkdir -p -v $(@D)
	bin/var-subst $< SRVROOT=${SRVROOT} > $@

build/%.xml : src/%.xml Makefile stubs
	@mkdir -p -v $(@D)
	bin/var-subst $< SRVROOT=${SRVROOT} > $@

ifeq ($(MODPHP),0)
	$(SED) -i -e '1i #!/usr/bin/php' $@
	chmod +x $@
else
	chmod -x $@
endif

build/%.css : src/%.css bin/MinifyCss.class stubs
	@mkdir -p -v $(@D)
	bin/var-subst $< SRVROOT=${SRVROOT} > $@
	$(JAVA) bin.MinifyCss $@

src/%.html : src/%.min
	bin/minutes/minute-gen $< > $@

build/%.thumb.png : src/%.png
	@mkdir -p -v $(@D)
	convert -thumbnail "100x100>" -background none -gravity center -extend 100x100 -unsharp 0x.5 $< $@

build/%.thumb.png : src/%.jpg
	@mkdir -p -v $(@D)
	convert -thumbnail "100x100>" -background none -gravity center -extent 100x100 -unsharp 0x.5 $< $@

build/social/gallery/index.html.php : src/social/gallery/index.html.php Makefile stubs $(shell ./bin/gettargets-gallery)
	@mkdir -p -v $(@D)
	bin/var-subst $< SRVROOT=${SRVROOT} > $@

build/% : src/%
	@mkdir -p -v $(@D)
	cp $< $@

# ======= SPECIAL FILES =======

src/sitemap.xml : etc/sitemap
	./bin/sitemap $< > $@

src/committee/minutes/index.html : $(shell ./bin/gettargets-minutes)
	@echo bin/minutes/minute-index > $@
	@bin/minutes/minute-index $^ > $@

src/social/gallery/%/index.html.php : $(wildcard src/social/gallery/%/*.png) $(wildcard src/social/gallery/%/*.jpg) stubs
	cp stubs/gallery.html.php $@
