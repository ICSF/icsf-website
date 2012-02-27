TARGETS=$(shell bin/gettargets)
SYNC=rsync
SYNCFLAGS=-rlt --perms --chmod=a=rX,u+w,Da+x --delete-after --exclude-from=etc/exclude --progress

.DEFAULT: build
.PHONY: all deploy build cleantidy

# ======= PHONY TARGETS =======

build: $(TARGETS)

all:
	$(MAKE) build
	$(MAKE) deploy

tidy:
	./bin/gettargets | sort -u > targets
	find build/ -type f | sort -u > current
	-comm -2 -3 current targets | xargs rm
	rm targets current

deploy:
	@mkdir -p -v build/
	$(SYNC) $(SYNCFLAGS) build/. "${DOCROOT}"

clean:
	rm build -rf

# ======= TOOL BUILDING =======

bin/MinifyCss.class : bin/MinifyCss.java bin/CssCompressor.java
	javac $<

# ======= FILE TYPE HANDLERS =======

build/%.html : src/%.html Makefile stubs
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/%.php : src/%.php Makefile stubs
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}
	
ifeq ($(MODPHP),0)
	sed -i -e '1i #!/usr/bin/php' $@
	chmod +x $@
else
	chmod -x $@
endif

build/%.css : src/%.css bin/MinifyCss.class stubs
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}
	java bin.MinifyCss $@

src/%.html : src/%.min
	./bin/minutes/minute-gen $< > $@

build/% : src/%
	@mkdir -p -v $(@D)
	./bin/nop $< $@

# ======= SPECIAL FILES =======

src/committee/minutes/index.php : $(shell ./bin/gettargets-minutes)
	./bin/minutes/minute-index $^ > $@

