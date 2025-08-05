<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('portfolio_link')->nullable()->after('salary_expectation');
            $table->text('bio')->nullable()->after('portfolio_link');
            $table->string('profile_picture')->nullable()->after('bio');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['portfolio_link', 'bio', 'profile_picture']);
        });
    }
};