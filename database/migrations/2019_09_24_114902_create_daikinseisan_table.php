<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDaikinseisanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daikinseisan', function(Blueprint $table)
		{
			$table->integer('kokyakubango')->nullable();
			$table->integer('synchroorderbango')->nullable();
			$table->integer('shinkurokokyakubango')->nullable();
			$table->string('shinkurokokyakuname', 50)->nullable();
			$table->string('shinkurokokyakugroup', 100)->nullable();
			$table->string('shinkurokokyakuorderbango', 50)->nullable();
			$table->dateTime('torikomidate')->nullable();
			$table->dateTime('chumondate')->nullable();
			$table->dateTime('otodokedate')->nullable();
			$table->string('otodoketime', 20)->nullable();
			$table->dateTime('kanryoubi')->nullable()->index();
			$table->string('kessaihouhou', 20)->nullable();
			$table->bigInteger('moneymax')->nullable();
			$table->string('chumonsyaname', 50)->nullable();
			$table->string('soufusakiname', 50)->nullable();
			$table->string('soufusakiyubinbango', 10)->nullable();
			$table->string('unsoumei', 50)->nullable();
			$table->string('toiawasebango', 50)->nullable()->index();
			$table->string('seisanunsoumei', 50)->nullable();
			$table->string('seisankokyakucode', 50)->nullable();
			$table->string('seisankokyakucode2', 50)->nullable();
			$table->dateTime('seisanbi')->nullable();
			$table->dateTime('hassoubi')->nullable();
			$table->dateTime('nyukinbi')->nullable();
			$table->dateTime('nyukinbi2')->nullable();
			$table->dateTime('henpinbi')->nullable();
			$table->string('henpindenpyobango', 50)->nullable();
			$table->string('shiharaikubun', 50)->nullable();
			$table->string('datakubun', 50)->nullable();
			$table->string('teiseikubun', 50)->nullable();
			$table->string('riyouservice', 50)->nullable();
			$table->string('kessaisyudan', 50)->nullable();
			$table->integer('nyukingaku')->nullable();
			$table->integer('unsoudaibikitesuryou')->nullable();
			$table->integer('unsouservicetesuryou')->nullable();
			$table->integer('unsousplittesuryou')->nullable();
			$table->integer('unsouinshigaku')->nullable();
			$table->integer('unsouunchin')->nullable();
			$table->integer('henpinunchin')->nullable();
			$table->integer('dataint01')->nullable();
			$table->integer('dataint02')->nullable();
			$table->integer('dataint03')->nullable();
			$table->string('datachar01', 50)->nullable();
			$table->string('datachar02', 50)->nullable();
			$table->string('datachar03', 50)->nullable();
			$table->dateTime('tourokudate')->nullable();
			$table->dateTime('koushindate')->nullable();
			$table->integer('status')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('daikinseisan');
	}

}
