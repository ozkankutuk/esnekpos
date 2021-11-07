<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalcolumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tckno')->unique()->nullable()->after('password');
            $table->string('vergino')->unique()->nullable()->after('tckno');
            $table->string('gsm')->unique()->after('vergino');
            $table->foreignId('parent_id')->nullable()->constrained('users')->cascadeOnDelete();

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
            $table->dropColumn('tckno');
            $table->dropColumn('vergino');
            $table->dropColumn('gsm');
            $table->dropColumn('parent_id');
        });
    }
}
