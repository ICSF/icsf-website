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
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/%.php : src/%.php Makefile
	@mkdir -p -v $(@D)
	./bin/var-subst $< $@ SRVROOT=${SRVROOT}

build/% : src/%
	@mkdir -p -v $(@D)
	./bin/nop $< $@

remote-clean:
	rm ${DOCROOT}/ -r
	mkdir ${DOCROOT}

clean:
	rm build -rf

