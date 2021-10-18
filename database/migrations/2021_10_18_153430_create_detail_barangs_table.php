<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barangs', function (Blueprint $table) {
            $table->id();
			$table->morphs('barangable');
			$table->integer('jumlah_kemasan');
			$table->string('satuan_kemasan')->index();
			$table->string('jns_dok')->nullable()->index();
			$table->string('no_dok')->nullable()->index();
			$table->date('tgl_dok')->nullable()->index();
			$table->string('pemilik')->index();
            $table->timestamps();
			$table->softDeletes($column = 'deleted_at', $precision = 0);
			$table->index('barangable_type');
			$table->index('barangable_id');
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
        Schema::dropIfExists('detail_barangs');
    }
}
