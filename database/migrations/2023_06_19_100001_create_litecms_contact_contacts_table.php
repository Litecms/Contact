<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLitecmsContactContactsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: litecms_contact_contacts
         */
        Schema::create('litecms_contact_contacts', function ($table) {
            $table->increments('id');
            $table->string('name', 250)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('email', 250)->nullable();
            $table->tinyInteger('default')->nullable();
            $table->string('website', 250)->nullable();
            $table->text('details')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->integer('zip')->nullable();
            $table->string('lat', 30)->nullable();
            $table->string('lng', 30)->nullable();
            $table->enum('status', ['Draft', 'Active', 'Inactive'])->nullable();
            $table->string('slug', 200)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type', 50)->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->text('marking', 200)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('litecms_contact_contacts');
    }
}
