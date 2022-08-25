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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('date_create');
            $table->integer('last_modified')->nullable();
            $table->integer('price')->nullable();
            $table->foreignID('responsible_user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignID('linked_company_id')->nullable()->constrained('companies')->onDelete('cascade');
            $table->foreignID('pipeline_id')->nullable()->constrained('pipelines')->onDelete('cascade');
            $table->integer('date_close')->nullable();
            $table->foreignID('status_id')->nullable()->constrained('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
