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
        Schema::create('szalamis', function (Blueprint $table) {
            $table->id();
            $table->string("nev");
            $table->float("ara");
            $table->string("tipus");
            $table->date("ido");
            $table->timestamps();
        });
        DB::table('szalamis')->insert(array('id'=>'1','nev'=>'szalami1','ara'=> '1000','tipus'=>'sertés','ido'=>'2022-01-15','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'2','nev'=>'szalami2','ara'=> '2000','tipus'=>'sertés','ido'=>'2022-11-11','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'3','nev'=>'szalami3','ara'=> '3000','tipus'=>'ló','ido'=>'2022-01-15','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'4','nev'=>'szalami4','ara'=> '4000','tipus'=>'marha','ido'=>'2022-04-21','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'5','nev'=>'szalámi5','ara'=> '5000','tipus'=>'marha','ido'=>'2022-06-18','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('szalamis');
    }
};
