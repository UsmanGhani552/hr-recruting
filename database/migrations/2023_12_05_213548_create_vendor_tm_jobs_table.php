<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTmJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_tm_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_member_id');
            $table->unsignedBigInteger('job_id');
            $table->foreign('team_member_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
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
        Schema::dropIfExists('vendor_tm_jobs');
    }
}
