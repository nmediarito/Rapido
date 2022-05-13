<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('total');
            $table->unsignedInteger('payment_status_id')->nullable();
            $table->unsignedInteger('payment_type_id')->nullable();
            $table->unsignedInteger('job_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('professional_id')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
