<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date_created');
            $table->dateTime('in_am', $precision = 0)->nullable();
            $table->dateTime('out_am', $precision = 0)->nullable();
            $table->dateTime('in_pm', $precision = 0)->nullable();
            $table->dateTime('out_pm', $precision = 0)->nullable();
            $table->integer('deduction')->default(1);
            $table->unsignedBigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('payslip_id')->nullable()->unsigned();

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
        Schema::dropIfExists('time_attendances');
    }
}
