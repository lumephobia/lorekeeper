<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalesForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            //
            $table->boolean('is_auction')->default(0);
            $table->boolean('is_sale')->default(0);
            $table->boolean('is_offer')->default(0);
            $table->boolean('is_xta')->default(0);
            $table->boolean('is_raffle')->default(0);
            $table->text('arturl');->default(0);
            $table->text('artlink');->default(0);
            $table->text('design');->default(0);
            $table->text('species');->default(0);
            $table->text('trait');->default(0);
            $table->text('price');->default(0);
            $table->text('type');->default(0);
            $table->text('startbit');->default(0);
            $table->text('minbit');->default(0);
            $table->text('autobuy');->default(0);
            $table->text('time');->default(0);
            $table->text('notes');->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('raffles', function (Blueprint $table) {
            $table->dropColumn('is_auction');
            $table->dropColumn('is_sale');
            $table->dropColumn('is_offer');
            $table->dropColumn('is_xta');
            $table->dropColumn('is_raffle');
            $table->dropColumn('arturl');
            $table->dropColumn('artlink');
            $table->dropColumn('design');
            $table->dropColumn('trait');
            $table->dropColumn('price');
            $table->dropColumn('type');
            $table->dropColumn('startbit');
            $table->dropColumn('minbit');
            $table->dropColumn('autobuy');
            $table->dropColumn('time');
            $table->dropColumn('notes');
        });
    }
}
