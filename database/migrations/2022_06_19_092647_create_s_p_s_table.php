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
            $table->bigInteger('vat_id')->nullable();
            $table->text('address')->nullable();
            $table->text('invoice_address')->nullable();
            $table->string('country')->nullable();
            $table->string('language_id')->nullable()->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('free_trial')->default(false);
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
