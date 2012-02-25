TARGETS=$(shell bin/gettargets)

.DEFAULT: build
.PHONY: all deploy build clean remote-clean

# ======= PHONY TARGETS =======

build: $(TARGETS)

all:
	$(MAKE) build
	$(MAKE) deploy

deploy:
	@mkdir -p -v build/
	cp build/. "${DOCROOT}" -r

remote-clean:
	rm ${DOCROOT}/ -r
	mkdir ${DOCROOT}

clean:
	rm build -rf

# ======= TOOL BUILDING =======

bin/MinifyCss.class : bin/MinifyCss.java bin/CssCompressor.java
	javac $<

# ======= FILE TYPE HANDLERS =======

build/%.html : src/%.html Makefile
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/%.php : src/%.php Makefile
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/%.css : src/%.css bin/MinifyCss.class
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}
	java bin.MinifyCss $@

src/%.html : src/%.min
	./bin/minute-gen $< > $@

build/% : src/%
	@mkdir -p -v $(@D)
	./bin/nop $< $@

