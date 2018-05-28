<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportFormatsTable extends Migration
{
    /**
     * Run the migrations.
     * This file creates draggable_components for the report-generator.
     * This is close to the list_options table, but this one if for the report generator module.
     *
     * TODO Link this table to users table in order to keep track of user adding or editing a component.
     *
     * @author Tigpezeghe Rodrige K. <tigrodrige@gmail.com> (2018)
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_report_generator')->create('report_formats', function (Blueprint $table) {
            $table->increments('id')->comment = "This will identify each component with a unique integer.";
            $table->string('user', 255)->default('default')->comment = "The user who created the report format. This will be 'default' for components that come with the module.";
            $table->string('title', 255)->comment = "This is the report name e.g Patient List.";
            $table->string('system_feature', 255)->comment = "The system feature under which the report belongs.";
            $table->text('description')->comment = "This describes the report format briefly.";
            $table->json('draggable_components_id')->comment = "This stores the id of all the components that belong to this report format";

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
        Schema::dropIfExists('report_formats');
    }
}
