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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('status')->default('ongoing');
            $table->string('mobileCompany')->nullable();
            $table->string('mobileModel')->nullable();
            $table->string('mobileImei')->nullable();
            $table->string('mobileProblem')->nullable();
            $table->string('customerName')->nullable();
            $table->string('customerMobile')->nullable();
            $table->string('entryDate')->nullable();
            $table->string('expenses')->nullable();
            $table->string('advancePayment')->nullable();
            $table->string('remarks')->nullable();
            $table->string('dischargeName')->nullable();
            $table->string('dischargeAmount')->nullable();
            $table->string('advanceAmount')->nullable();
            $table->string('dischargeUserAmount')->nullable();
            $table->string('dischargeDate')->nullable();
            $table->string('commissionAmount')->nullable();
            $table->string('serialNo')->nullable();
            $table->string('accessories1')->nullable();
            $table->string('accessories2')->nullable();
            $table->string('accessories3')->nullable();
            $table->string('accessories4')->nullable();
            $table->string('accessories5')->nullable();
            $table->string('otherAccessories')->nullable();
            $table->string('outdoorName')->nullable();
            $table->string('outdoorAmount')->nullable();
            $table->string('outdoorUser')->nullable();
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
        Schema::dropIfExists('entries');
    }
};
