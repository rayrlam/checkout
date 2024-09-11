<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInvoiceLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_lines', function (Blueprint $table) {
            $table->foreign(['invoice_header_id'], 'fk_invoice_header_id')->references(['id'])->on('invoice_headers')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_lines', function (Blueprint $table) {
            $table->dropForeign('fk_invoice_header_id');
        });
    }
}
