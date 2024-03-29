<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_p_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->bigInteger("mobile");
            $table->string('email')->nullable();
            $table->string('vat_id')->nullable();
            $table->text('address')->nullable();
            $table->text('post_address')->nullable();
            $table->text('zipcode')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('invoice_address')->nullable();
            $table->text('post_invoice_address')->nullable();
            $table->text('zipcode_invoice_address')->nullable();
            $table->text('city_invoice_address')->nullable();
            $table->string('country_invoice_address')->nullable();
            $table->string('language_id')->nullable()->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('free_trial')->default(false);
            $table->date('free_trial_end_date')->nullable();

            $table->string('subscription')->nullable();
            $table->text('logo_url')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('s_p_s');
    }
}
