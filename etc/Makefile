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

# ======= FILE TYPE HANDLERS =======

build/%.html : src/%.html Makefile
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/%.php : src/%.php Makefile
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/% : src/%
	@mkdir -p -v $(@D)
	./bin/nop $< $@

