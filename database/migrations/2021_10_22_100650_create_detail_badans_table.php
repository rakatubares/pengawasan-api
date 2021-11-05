<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBadansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_badans', function (Blueprint $table) {
            $table->id();
			$table->morphs('badanable');
            $table->string('nama')->index();
			$table->date('tgl_lahir')->nullable()->index();
			$table->string('warga_negara')->nullable()->index();
			$table->text('alamat')->nullable();
			$table->string('jns_identitas')->nullable()->index();
			$table->string('no_identitas')->nullable()->index();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index('badanable_type');
			$table->index('badanable_id');
			$table->index('created_at');
			$table->index('updated_at');
			$table->index('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_badans');
    }
}
