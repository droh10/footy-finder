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
        /**
        * id - autoincrement
        * title  - varchar 500
        * description TEXT
        * user_id - INT
        * venue - TEXT (could be google maps address)
        * date DATE
        * start_time TIME
        * end_time TIME
        * status ENUM("A", "I")
        * contact_person_name
        * contact_number
        * contact_email
        */
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', '500');
            $table->text('description');
            $table->foreignId('user_id')->constrained();
            $table->text('venue');
            $table->date('date');
            $table->time('start_time', $precision = 0);
            $table->time('end_time', $precision = 0);
            $table->enum('status', ['A', 'I']);
            $table->unsignedInteger('play_type_id')->index();
            $table->foreign('play_type_id')->references('id')->on('play_types');
            $table->unsignedInteger('player_type_id')->index();
            $table->foreign('player_type_id')->references('id')->on('player_types');
            $table->string('contact_person_name', '500');
            $table->string('contact_number', '20');
            $table->string('contact_email', '500');
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
        Schema::dropIfExists('schedules');
    }
};
