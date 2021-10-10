<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedcarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usedcars', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            
            $table->foreignId('user_id')->index();
            $table->foreignId('make_id')->nullable();
            $table->foreignId('car_model_id')->index();
            $table->foreignId('color_id')->index();
            $table->foreignId('fuel_type_id')->index();
            $table->foreignId('body_type_id')->index();
            $table->foreignId('transmission_id')->index();

            $table->unsignedMediumInteger('registration_year');
            $table->unsignedInteger('km_driven');
            $table->unsignedSmallInteger('number_of_owner');

            $table->string('car_location', 191);
            $table->longText('about_car');
            
            $table->longText('cover_photo');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usedcars');
    }
}
