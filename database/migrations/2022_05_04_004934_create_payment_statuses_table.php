<?php

use App\Models\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
        });

        $data = [
            ['id' => 1, 'name' => 'Pending',],
            ['id' => 2, 'name' => 'Complete',],
            ['id' => 3, 'name' => 'Cancelled',],
            ['id' => 4, 'name' => 'Refunded',],
            ['id' => 5, 'name' => 'Deposit',],
            ['id' => 6, 'name' => 'Withdraw',],
        ];

        PaymentStatus::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_statuses');
    }
}
