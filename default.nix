{ pkgs ? (import <nixpkgs> {}), debug ? false }:
	pkgs.stdenv.mkDerivation rec {
		name = "icsf-website";
		src = ./.;
		buildInputs = with pkgs; [ imagemagick php perl rsync jdk ];
		PHPRC = "etc";
}

# https://ocharles.org.uk/blog/posts/2014-02-04-how-i-develop-with-nixos.html
