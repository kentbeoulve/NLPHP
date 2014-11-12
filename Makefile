check:
	./vendor/bin/phpcs --warning-severity=0 --standard=PSR2 src tests
	./vendor/bin/phpunit --coverage-text --coverage-clover=coverage.clover
	./vendor/bin/phpcpd src/ tests/

scrutinizer:
	wget https://scrutinizer-ci.com/ocular.phar
	php ocular.phar code-coverage:upload --format=php-clover coverage.clover
