<?php

use App\Models\JobStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
        });

        $data = [
            ['id' => 1, 'name' => 'Pending',],
            ['id' => 2, 'name' => 'Accepted',],
            ['id' => 3, 'name' => 'Completed',],
            ['id' => 4, 'name' => 'Job In-Progress',],
        ];

        JobStatus::insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_statuses');
    }
}
