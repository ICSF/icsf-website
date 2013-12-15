TARGETS=$(shell bin/gettargets)
SYNC=rsync
SYNCDEL=--delete-after
SYNCPERMS=--perms --chmod=a=rX,u+w,Da+x
SYNCEXCLUDE=etc/exclude
SYNCFLAGS=-rltc $(SYNCPERMS) $(SYNCDEL) --exclude-from=$(SYNCEXCLUDE) --progress --stats

JAVAC=javac
JAVA=java
SED=sed

PATH:=./bin:./bin/minutes:./bin/validator:$(PATH)

.DEFAULT: build
.PHONY: all deploy build clean tidy

# ======= PHONY TARGETS =======

build: $(TARGETS)

all:
	$(MAKE) build
	$(MAKE) deploy

tidy:
	@mkdir -p -v build/
	gettargets | sort -u > targets
	find build/ -type f | sort -u > current
	comm -2 -3 current targets | xargs --no-run-if-empty rm -v
	rm targets current
	find build -depth -type d -empty -exec rmdir -v '{}' \;

deploy: tidy
	@mkdir -p -v build/
	$(SYNC) $(SYNCFLAGS) build/. "$(DOCROOT)"

test:
	SRVROOT="$(SRVROOT)/" bin/validate

clean:
	rm build src/committee/minutes/index.html -rf

# ======= TOOL BUILDING =======

bin/MinifyCss.class : bin/MinifyCss.java bin/CssCompressor.java
	$(JAVAC) $<

# ======= FILE TYPE HANDLERS =======

build/%.html : src/%.html Makefile stubs
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}

build/%.html : build/%.html.php Makefile stubs
	php $< > $@

build/%htaccess : src/%htaccess Makefile stubs
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}

build/%.php : src/%.php Makefile stubs
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}

ifeq ($(MODPHP),0)
	$(SED) -i -e '1i #!/usr/bin/php' $@
	chmod +x $@
else
	chmod -x $@
endif

build/%.css : src/%.css bin/MinifyCss.class stubs
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}
	$(JAVA) bin.MinifyCss $@

src/%.html : src/%.min
	minute-gen $< > $@

build/%.thumb.png : src/%.png
	@mkdir -p -v $(@D)
	convert -thumbnail "100x100>" -background none -gravity center -extend 100x100 -unsharp 0x.5 $< $@

build/%.thumb.png : src/%.jpg
	@mkdir -p -v $(@D)
	convert -thumbnail "100x100>" -background none -gravity center -extent 100x100 -unsharp 0x.5 $< $@

build/social/gallery/index.html.php : src/social/gallery/index.html.php Makefile stubs $(shell ./bin/gettargets-gallery)
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}

build/% : src/%
	@mkdir -p -v $(@D)
	cp $< $@

# ======= SPECIAL FILES =======

src/committee/minutes/index.html : $(shell ./bin/gettargets-minutes)
	@echo minute-index > $@
	@minute-index $^ > $@

src/social/gallery/%/index.html.php : $(wildcard src/social/gallery/%/*.png) $(wildcard src/social/gallery/%/*.jpg) stubs
	cp stubs/gallery.html.php $@

