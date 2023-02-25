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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_no')->nullable();
            $table->string('user_name')->nullable();
            
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('personal_phone')->nullable();
            $table->string('email')->nullable();

            $table->string('marital_status')->nullable();
            $table->string('country')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->nullable();
            $table->date('hire_date')->nullable();
            $table->date('probation_end_date')->nullable();

            $table->string('emp_type')->nullable();
            $table->date('date_of_permanent')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('emergency_contact_no')->nullable();

            $table->string('department')->nullable();
            $table->string('unit')->nullable();
            $table->string('designation')->nullable();
            $table->string('grade')->nullable();
            $table->string('reporting_to')->nullable();
            $table->date('termination')->nullable();
            $table->longText('termination_note')->nullable();

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
        Schema::dropIfExists('employees');
    }
};
