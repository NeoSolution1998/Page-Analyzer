start:
	php artisan serve
migrate:
	php artisan migrate
test:
	php artisan test
deploy:
	git push heroku
update:
	composer update
autoload:
	composer dump-autoload