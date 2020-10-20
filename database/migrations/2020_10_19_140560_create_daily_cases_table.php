<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_cases', function (Blueprint $table) {
            $table->id();
            $table->date('reported_date');
            $table->unsignedBigInteger('detected_province_id')->nullable()->default(null);
            $table->unsignedBigInteger('detected_district_id')->nullable()->default(null);
            $table->unsignedBigInteger('detected_city_id')->nullable()->default(null);
            $table->string('patient_name')->nullable()->default(null);
            $table->string('gender');
            $table->string('dob')->nullable()->default(null);
            $table->string('nationality')->nullable()->default(null);
            $table->string('status');
            $table->string('place_of_death');
            $table->date('date_of_death')->nullable()->default(null);
            $table->string('created_by');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_cases');
    }
}
