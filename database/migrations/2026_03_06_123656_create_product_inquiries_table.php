<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_name');
            $table->string('business_type')->nullable();
            $table->string('country_code')->nullable();
            $table->string('whatsapp')->nullable();
            $table->json('gender')->nullable();
            $table->json('age')->nullable();
            $table->json('product_types')->nullable();
            $table->text('message_note')->nullable();
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
        Schema::dropIfExists('product_inquiries');
    }
}
