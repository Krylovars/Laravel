curl -s https://laravel.build/laravelDemo | bash

alias sail='./vendor/bin/sail' 

sail up -d

sudo chmod -R 777 ~/project/laravelDemo

sail npm install

sail npm run dev

## docker-compose.yml:

```
phpmyadmin:
            image: phpmyadmin/phpmyadmin
            links:
                - mysql:mysql
            ports:
                - 8080:80
            environment:
                MYSQL_USERNAME: "${DB_USERNAME}"
                MYSQL_ROOT_PASSWORD: "${DB_PASSWORD}"
                PMA_HOST: mysql
            networks:
                - sail
            depends_on:
                - mysql
```

sail artisan make:model Product -m

sail artisan make:migration create_category_product_table

http://localhost/

http://localhost:8080/index.php

## Migration Product

```php
$table->string('name');
$table->decimal('price', 9, 2);
```

## Model Product

```jsx
protected $fillable = ['name', 'price'];
```

sail artisan migrate

sail artisan make:factory ProductFactory

```php
return [
            'name' => fake()->name(),
            'price' =>  fake()->randomFloat(2, 10, 1000),
        ];
```

sail artisan db:seed

```php
npm install bootstrap
npm install sass
npm install sass-loader
```

sail artisan make:controller AuthController
