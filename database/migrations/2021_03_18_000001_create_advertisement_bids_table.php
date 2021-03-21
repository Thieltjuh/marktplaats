<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'advertisement_bids',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('advertisement_id');
                $table->unsignedBigInteger('user_id');
                $table->foreign('advertisement_id')->references('id')->on('advertisements')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('amount');
                $table->timestamp('placed_at')->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement_bids');
    }
}
