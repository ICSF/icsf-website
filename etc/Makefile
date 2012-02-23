TARGETS=$(shell bin/gettargets)

.DEFAULT: all
.PHONY: all deploy build-impl remote-clean

all:
	$(MAKE) build-impl
	$(MAKE) deploy

deploy: build
	cp build/. "${DOCROOT}" -r

build-impl: $(TARGETS)

build:
	mkdir -p -v build/

build/%.html : src/%.html Makefile
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/%.php : src/%.php Makefile
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/% : src/% build
	./bin/nop $< $@

remote-clean:
	rm ${DOCROOT}/ -r
	mkdir ${DOCROOT}

clean:
	rm build -rf

