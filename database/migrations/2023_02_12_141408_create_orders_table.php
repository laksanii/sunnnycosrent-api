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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("email", 255);
            $table->string("telp_numb", 15);
            $table->string("whatsapp", 15);
            $table->string("instagram", 255);
            $table->string("address", 255);
            $table->string("family_number1", 15);
            $table->string("family_number2", 15);
            $table->string("province", 255);
            $table->string("city", 255);
            $table->string("district", 255);
            $table->string("post_code", 6);
            $table->string("KTP_pict", 2048);
            $table->string("KTP_selfie", 2048);
            $table->bigInteger("costume_id")->unsigned();
            $table->date("rent_date");
            $table->date("ship_date");
            $table->string("payment_status", 255)->default('belum lunas');
            $table->decimal("DP", 10, 0)->default(0);
            $table->decimal("total_price", 10, 0)->default(0);
            $table->decimal("shipping", 10, 0)->default(0);
            $table->char("code", 12)->unique();
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
        Schema::dropIfExists('orders');
    }
};