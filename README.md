Sao chép thư mục menu-manager vào thư mục packagse của project

Thêm dòng khai báo vào thư mục config/app
	'providers' => [

        /*
         * Laravel Framework Service Providers...
         */

	    	...

	        Manager\MenuManager\MenuManagerServiceProvider::class,

	        ...

	],

	'aliases' => [
		...
		'MenuManager'      => Manager\MenuManager\Facade::class,
	],

Trong tệp composer.json:

	"autoload": {
        "classmap": [
           ...
        ],
        "psr-4": {
            ...
            "Manager\\MenuManager\\" : "packages/menu-manager/src"
        }
    },

Chạy lệnh trong cmd: 
	
	php artisan vendor:publish --provider="Manager\MenuManager\MenuManagerServiceProvider"

	php artisan migrate

Chỉnh sửa middleware trong config/menu-mager.php trong mục middleware

Chạy đường dẫn /menu-manager để vào trang quản lý danh mục.