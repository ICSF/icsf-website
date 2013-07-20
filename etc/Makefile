TARGETS=$(shell bin/gettargets)
SYNC=rsync
SYNCDEL=--delete-after
SYNCPERMS=--perms --chmod=a=rX,u+w,Da+x
SYNCEXCLUDE=etc/exclude
SYNCFLAGS=-rlt $(SYNCPERMS) $(SYNCDEL) --exclude-from=$(SYNCEXCLUDE) --progress --stats

PATH:=./bin:./bin/minutes:$(PATH)

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

clean:
	rm build -rf

# ======= TOOL BUILDING =======

bin/MinifyCss.class : bin/MinifyCss.java bin/CssCompressor.java
	javac $<

# ======= FILE TYPE HANDLERS =======

build/%.html : src/%.html Makefile stubs
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}

build/%htaccess : src/%htaccess Makefile
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}

build/%.php : src/%.php Makefile stubs
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}

ifeq ($(MODPHP),0)
	sed -i -e '1i #!/usr/bin/php' $@
	chmod +x $@
else
	chmod -x $@
endif

build/%.css : src/%.css bin/MinifyCss.class stubs
	@mkdir -p -v $(@D)
	var-subst $< $@ SRVROOT=${SRVROOT}
	java bin.MinifyCss $@

src/%.html : src/%.min
	minute-gen $< > $@

build/% : src/%
	@mkdir -p -v $(@D)
	cp $< $@

# ======= SPECIAL FILES =======

src/committee/minutes/index.php : $(shell ./bin/gettargets-minutes)
	@echo minute-index > $@
	@minute-index $^ > $@

