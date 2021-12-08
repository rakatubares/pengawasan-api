<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefUserCacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_user_cache', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
			$table->string('username')->index();
			$table->string('name')->index();
			$table->string('nip')->index();
			$table->string('pangkat')->index();
			$table->string('penempatan')->index();
			$table->string('pejabat')->index();
			$table->string('status')->index();
            $table->timestamps();
			$table->primary('user_id');
			$table->index('created_at');
			$table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_user_cache');
    }
}
