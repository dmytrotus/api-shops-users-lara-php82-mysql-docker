## How to start the project with Docker

Clone the project:

```bash
git clone https://github.com/dmytrotus/api-shops-users-lara-php82-mysql-docker.git
```

Enter the project:

```bash
cd api-shops-users-lara-php82-mysql-docker
```

Run command:

```bash
docker compose up -d 
```
or

```bash
docker compose up -d --build
```

Then open in your browser

```bash
    http://localhost:7774/
```

## Migration and Seeding

When you will open the browser for the first time, you will see a button which makes migration and seeding for you, and reload the app automatically.

Default seeding data contains:
`table users: 5 records`
`table shops: 24 records`
`table products: 45 000 records`

If you prefer to make migration and seeding by yourself, you can:
Enter the docker container 

```bash
docker exec -it api-shops-php /bin/bash
```

Then run for migration:

```bash
php artisan migrate
```

Or for seeding:

```bash
php artisan db:seed
```

If you want to change the amount of shops of products for seeder just change this amounts in /app/.env file

`SEEDED_PRODUCTS_COUNT=45000`
`SEEDED_SHOPS_COUNT=24`

If you will use this project in production add the `.env` file to `.gitignore`
keeping `.env` file in repo is not safe. 

## Where to find the token?

`$user->api_token`
or 
`in database.users.api_token`

## List of endpoints available in the app

``
api --request GET \
--url "/api/user" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

``
api --request GET \
--url "/api/shop/all" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

``
api --request GET \
--url "/api/shop/show/{id}" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

``
api --request POST \
--url "/api/shop/store" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Content-type: application/x-www-form-urlencoded"\
--header "Accept: application/json"
``

``
api --request PUT \
--url "/api/shop/update/{id}" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Content-type: application/x-www-form-urlencoded"\
--header "Accept: application/json"
``

``
api --request DELETE \
--url "/api/shop/delete/{id}" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

``
api --request GET \
--url "/api/shop/show-products/{id}" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

``
api --request GET \
--url "/api/product/all" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

``
api --request GET \
--url "/api/product/show/{id}" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

``
api --request POST \
--url "/api/product/store" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Content-type: application/x-www-form-urlencoded"\
--header "Accept: application/json"
``

``
api --request PUT \
--url "/api/product/update/{id}" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Content-type: application/x-www-form-urlencoded"\
--header "Accept: application/json"
``

``
api --request DELETE \
--url "/api/product/delete/{id}" \
--header "Authorization: Bearer YOUR-TOKEN"\
--header "Accept: application/json"
``

## Postman

If you are using Postman you can download the collection from the root of this project

`Shop-users-test-task.postman_collection.json`

Collection includes all endpoints from the app. You need only to change the api_key.

## How to run tests

Just run command:

```bash
php artisan test
```
or

```bash
php artisan config:cache && php artisan test
```