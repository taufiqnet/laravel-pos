<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('emp_no');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse')->nullable();
            $table->string('tin')->nullable();
            $table->string('nid')->nullable();
            $table->longText('education')->nullable();
            $table->longText('training')->nullable();
            $table->string('experience')->nullable();
            $table->string('ssc_certificate')->nullable();
            $table->string('hsc_certificate')->nullable();
            $table->string('honors_certificate')->nullable();
            $table->string('masters_certificate')->nullable();
            $table->string('resume')->nullable();
            $table->string('personal_file')->nullable();
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
        Schema::dropIfExists('employee_details');
    }
};
