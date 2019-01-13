# Laravel Project Report 
#### Matthew Pantaleon

---

## Table of Contents
1. [Laravel](#laravel)
1. [Database](#Database)
	* [Migrations](#migrations)
		 * [ENV](#ENV)
2. [Migrations](#example2)
3. [Seeders](#third-example)
4. [Models](#third-example)
5. [Tinker](#Tinker)

---

### Laravel

First thing I did was create a new laravel application. I made sure I had composer installed and made sure that the command prompt knows where composer was I typed in `composer global require laravel/installer` to get the laravel instaler. Again I made sure the command prompt knows what laravel is then I typed in `laravel new blog`. While working on different machines in the college I was not able to use laravel it self so I typed a composer comamnd that does the same thing `composer create-project --prefer-dist laravel/laravel NAME`. NAME is the name of the laravel application that will be created.

### Database

Now that I have fresh laravel application I moved on to the database. The database structure consists of 6 main tables. Patients, Doctors, Visits, companies, users and roles. <br>
Patients and doctors have a many-to-many relation ship through the visits table. <br>
Patients can have one company and a company can have many patients. Making it a one-to-many.
Users can only have one role and a role can have multiple users. Also making it a one-to-many.

below it the structure of the database.

![structure](database_structure.PNG)

---

#### Migrations

Migrations are what laravel uses to be able to create database tables.
I used comamnds the artisan command e.g.`php artisan make:migration create_doctors_table` to create blank migration files. I created one for each table I need. With the exception of the users table I used `php artisan make:auth` This creates all the user related migration, model, view ad controller files for user functionality. Login and register.

I edited each file to have any columns I wanted it each table and added constraints to the table where it was needed. For example the visits table.

```php

<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    
    public function up()
    {
		//creates the columns of the visits table
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
			$table->date('date');
			$table->time('time');
			$table->integer('duration');
			$table->double('price', 15, 2);
            $table->timestamps();
			
			//adds foriegn keys on doctors_id and patients_id on doctors and patients table respectively
			$table->foreign('doctor_id')->references('id')->on('doctors');
			$table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}

```

`$table` will be the value of the substring between *create_* and *_table* in the migration file name. You can speicify a custom table name by defining your own `$table` variable. e.g. `$table = 'custom_name'`.
<br>

After migrating one a SQL an error is returned saying *specified key was too long*. This is because the xampp version that we use runs on an SQL version lower than what laravel supports by default. To fix this I went to the *AppServiceProvider* file and edited as such:

```php

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //imports the Schema class

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191); // fizes SQL error of key being too long
    }
}

```



<br>
Since my tables have foriegn key constraints, the foriegn key constraints must be unsigned integers and the order in which the migrations or executed is very important. If I migrate the visits table first before either the codtors or patients. Laravel will return an SQL error. I have a similar situation for companies and patients where companies table must be created first.
<br>

Laravel executes the migrations based on the date order of the files. As shown here the visits table is the last file to be migrated. I didn't know it did this as I made my visits migration file before my patients file after realising this then changed the date on the visits migration.

![migration order](migrations.PNG)


#### ENV

Now that I had my migrations laravel needs to know where I'm migrating the files to, to create databae tables. In the ENV file in the root of the application I made sure that the databse name exists and set the username and pasword for phpMyAdmin.

```javascipt

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medical
DB_USERNAME=root
DB_PASSWORD=

```
---

Now Laravel knows where to migrate the files. I migrated them using the command: `php artisan migrate` and this will create create empty tables in the database. If I found out that there was something I missed in the migrations or an error then I fix it. I can execute: `php artisan migrate:refresh`. This will rollback all existing migrations and migrate again.
<br>
Now there are empty tables in







