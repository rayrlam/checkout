<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->default(0);
            $table->boolean('method')->default(0);
            $table->unsignedBigInteger('qtyorid');
            $table->decimal('sprice', 8, 2);
            $table->decimal('eprice', 14, 6);
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
        Schema::dropIfExists('rules');
    }
}
