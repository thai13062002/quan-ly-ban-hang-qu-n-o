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
        Schema::table('like_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->after('user_id');
            $table->dropForeign('like_products_product_variation_id_foreign');
            $table->dropColumn('product_variation_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('like_products', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->unsignedBigInteger('product_variation_id');
        });
    }
};
