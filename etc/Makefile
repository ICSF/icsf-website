TARGETS=$(./bin/gettargets)

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

build/% : src/% build
	cp $< $@

remote-clean:
	rm ${DOCROOT}/ -r
	mkdir ${DOCROOT}

clean:
	rm build -rf

