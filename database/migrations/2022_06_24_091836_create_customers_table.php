<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string("customer_type")->default(1); //1 - bussiness and 2. consumer
            $table->string("name")->nullable();
            $table->bigInteger("mobile")->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->bigInteger('company_phone')->nullable();
            $table->string('vat_id')->nullable();
            $table->text('company_address')->nullable();
            $table->text('company_post_address')->nullable();
            $table->text('company_zipcode')->nullable();
            $table->text('company_city')->nullable();
            $table->text('company_country')->nullable();
            $table->boolean('newsletter')->default(false);
            $table->boolean('marketing_permission')->default(false);
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
        Schema::dropIfExists('customers');
    }
}
