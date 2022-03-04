<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->nullable();
            $table->string('avatar')->nullable();            
            $table->string('provider')->nullable();
            $table->unsignedBigInteger('provider_id')->nullable()->unique();
            $table->string('token')->nullable();
            $table->string('token_secret')->nullable();
            $table->enum('status', ['active','inactive']);            
            $table->boolean('public')->default(false);   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('nickname');
        $table->dropColumn('avatar');
        $table->dropColumn('provider');
        $table->dropColumn('provider_id');
        $table->dropColumn('token');
        $table->dropColumn('token_secret');
        $table->dropColumn('status');
        $table->dropColumn('public');
        });
    }
}