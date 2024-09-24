<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokLptiTugasTable extends Migration
{
    protected $tableName = 'dok_lpti_tugas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->morphs('tugasable');
            $table->text('tugas');
            $table->timestamps();
			$table->softDeletes();
			$table->string('created_by')->nullable()->index();
			$table->string('updated_by')->nullable();
			$table->string('deleted_by')->nullable();
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
        Schema::dropIfExists($this->tableName);
    }
}
