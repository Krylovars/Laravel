sail artisan make:migration add_is_admin_to_users_table --table=users

sail artisan migrate

sail artisan make:middleware CheckIsAdmin

sail artisan make:model Category -m

sail artisan make:controller Admin/CategoryController --resource

sail artisan make:migration create_category_product_table

sail artisan make:controller Admin/ProductController --resource

sail artisan make:migration create_product_images

sail artisan storage:link

<img style="height: 50px;" src="{{asset('storage/productsImage/').'/'.$img->file_name}}">
