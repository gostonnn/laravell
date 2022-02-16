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
            $table->string("név");
            $table->float("ár");
            $table->string("típus");
            $table->date("lejárati_idő");
            $table->timestamps();
        });
        DB::table('szalamis')->insert(array('id'=>'1','név'=>'lókolbász','ár'=> '1000','típus'=>'ló','lejárati_idő'=>'2022-01-22','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'2','név'=>'marhakolbász','ár'=> '2000','típus'=>'marha','lejárati_idő'=>'2022-11-16','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'3','név'=>'kengurukolbász','ár'=> '3000','típus'=>'kenguru','lejárati_idő'=>'2022-02-20','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'4','név'=>'bölénykolbász','ár'=> '4000','típus'=>'bölény','lejárati_idő'=>'2022-05-26','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
        DB::table('szalamis')->insert(array('id'=>'5','név'=>'kecskekolbász','ár'=> '5000','típus'=>'kecske','lejárati_idő'=>'2022-06-19','created_at'=>DB::raw('NOW()'),'updated_at'=>DB::raw('NOW()')));
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
