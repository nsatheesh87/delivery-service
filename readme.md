# Lumen PHP Framework - Delivery service and cost setup

Step 1:
```
git clone https://github.com/nsatheesh87/delivery-service.git
```
Step 2:
```
cd working directory
```
step 3:
```
docker run --rm -v $(PWD):/app koutsoumpos89/composer-php7.1 install
```
step 4:
```
docker-compose up -d
```
step 5:
```
cp .env-example to .env
```
step 6:
```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed

```

Step 7: (To run phpunit test)

````
docker run --rm -v /$(PWD):/app koutsoumpos89/composer-php7.1 vendor/bin/phpunit
````

 HTTP endpoints:

- [POST `/api/vi/pigeon`: Submit the Order]


### Submit the deliver order

Method:  
 - `POST`

Input body:  

```json
{
	"distance":"600",
	"deadline":"31/07/2018"
}
```