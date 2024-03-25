all: build

build:
	docker compose -f server.docker-compose.yml up -d
build_attach:
	docker compose -f server.docker-compose.yml up
down:
	docker compose -f server.docker-compose.yml down
lint: build
	docker exec --workdir /app team_8-php-1 php codesniffer/phpcs.phar -s --standard=./codesniffer/phpcs_ruleset.xml --ignore=*.js public
lint-fix: build
	docker exec --workdir /app team_8-php-1 php codesniffer/phpcbf.phar -s --standard=./codesniffer/phpcs_ruleset.xml --ignore=*.js public