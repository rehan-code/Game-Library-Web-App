all: build

build:
	docker compose -f server.docker-compose.yml up -d
down:
	docker compose -f server.docker-compose.yml down
lint:
	php codesniffer/phpcs.phar -s --standard=./codesniffer/phpcs_ruleset.xml --ignore=../*.js html
lint-fix:
	php codesniffer/phpcbf.phar -s --standard=./codesniffer/phpcs_ruleset.xml --ignore=../*.js html