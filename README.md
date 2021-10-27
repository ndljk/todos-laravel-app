# TODOs-API

The application displays TODOs in an HTML table by retrieving JSON data from REST API “/todos” endpoint which is available at [{JSON} Placeholder](https://jsonplaceholder.typicode.com/todos). The user has the ability to log in to the system and can send TODOs to their email. Also, one of the additions to the application is localization, which is available in three languages (English, Bosnian/Croatian/Serbian, Slovenian).

## Prerequisites

To connect to the database, you need to have [XAMP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/en/) and then you easily can start the MySQL and Apache modules.

## Usage

**_The application can be used without logging into the system, but then there is no possibility of sending TODOs to your email._**

Firstly, you need to modify the .env file to set your credentials for the database.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

The project have included migration and seeding files.

```php
public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
```

```php
public function run()
    {
        //
        DB::table('users')->insert(
            [
            'email'=>'kovacevic.nedeljko@yahoo.com',
            'password'=>'123456'
            ]
        );
    }
```

After the modification of the .env file, you need to migrate the table to your database, using Windows Terminal, and then seed it.

```bash
php artisan migrate
```

```bash
php artisan db:seed --class=UsersSeeder
```

You should get the table `users` after migration, and after seeding you should get a user with email `kovacevic.nedeljko@yahoo.com` and password `123456`. Now you can login with this email and password. The registration system is not provided.

###### Search

Because there is to many rows in the table, the app also provides the live search which is realized with jQuery.

###### Localization

Also Laravel's localization features provide a convenient way to retrieve strings in various languages, allowing you to easily support multiple languages within your application. In this application supported languages are:
English
Bosnian/Croatian/Serbian and
Slovenian

## Contact

If you have any aditional question or you notice some error, please be free to send an e-mail to Nedeljko Kovacevic via [kovacevic.nedeljko@yahoo.com](mailto:kovacevic.nedeljko@yahoo.com).

## License

[MIT](https://choosealicense.com/licenses/mit/)
