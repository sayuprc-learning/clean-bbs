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
        Schema::create('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_id')->primary();
            $table->unsignedBigInteger('bbs_id');
            $table->string('content', 1024);
            $table->dateTime('posted_at');
            $table->timestamps();

            $table->foreign('bbs_id')->references('bbs_id')->on('bbses')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
