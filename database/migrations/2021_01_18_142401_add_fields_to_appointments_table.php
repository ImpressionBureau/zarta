<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('appointments', 'service_id')) {
            Schema::table('appointments', function (Blueprint $table) {
                $table->dropColumn('service_id');
            });
        }

        Schema::table('appointments', function (Blueprint $table) {
            $table->nullableMorphs('service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropMorphs('service');
        });
    }
}
