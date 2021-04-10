<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrderShippingAddressUpdateStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_shipping_addresses', function (Blueprint $table) {
            $table->dropColumn('object');
            $table->dropColumn('object_id');
            $table->unsignedBigInteger('province_id')->nullable()->after('osa_id')->default(0);
            $table->unsignedBigInteger('city_id')->after('province_id');
            $table->unsignedBigInteger('brgy_id')->after('city_id'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_shipping_addresses', function (Blueprint $table) {
            $table->string('object');
            $table->unsignedBigInteger('object_id');
            $table->dropColumn('province_id')->nullable()->default(0);
            $table->dropColumn('city_id');
            $table->dropColumn('brgy_id'); 
        });
    }
}
