all: build

build:
	docker compose -f server.docker-compose.yml up -d
down:
	docker compose -f server.docker-compose.yml down
lint:
	docker exec --workdir /app team_8-php-1 php codesniffer/phpcs.phar -s --standard=./codesniffer/phpcs_ruleset.xml --ignore=*.js public
lint-fix:
	docker exec --workdir /app team_8-php-1 php codesniffer/phpcbf.phar -s --standard=./codesniffer/phpcs_ruleset.xml --ignore=*.js public