<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountrulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discountrules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->default(0);
            $table->decimal('sprice', 8, 2);
            $table->unsignedSmallInteger('ifqty')->default(0);
            $table->unsignedBigInteger('ifid')->default(0);
            $table->boolean('is_consistent')->default(1);
            $table->timestamp('expirydate')->nullable();
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
        Schema::dropIfExists('discountrules');
    }
}
