<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusOnUserVacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_vacancy', function (Blueprint $table) {
            $table->enum('status', ['processed', 'accepted', 'rejected'])->after('vacancy_id')->default('processed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_vacancy', function (Blueprint $table) {
            //
        });
    }
}
