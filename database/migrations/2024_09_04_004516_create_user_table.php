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
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('nama');
			$table->string('email');
			$table->string('password');
			$table->string('level');
			$table->string('mobile')->nullable();
            $table->string('address')->nullable();
			$table->foreignId('id_membership')->nullable()->constrained('membership')->onDelete('cascade');
			$table->foreignId('id_review')->nullable()->constrained('review')->onDelete('cascade');
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
		Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_membership']);
            $table->dropColumn('id_membership');
			$table->dropForeign(['id_review']);
            $table->dropColumn('id_review');
        });
	}
};