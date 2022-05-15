<?php

use App\Models\FailureType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailureTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failure_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
        });

        $data = [
            ['id' => 1, 'name' => 'Flat batteries',],
            ['id' => 2, 'name' => 'Flat tyres',],
            ['id' => 3, 'name' => 'Towing',],
            ['id' => 4, 'name' => 'Locked out',],
            ['id' => 5, 'name' => 'Fuel delivery',],
        ];

        FailureType::insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failure_types');
    }
}
