<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokStiTugasTable extends Migration
{
    protected $tableName = 'dok_sti_tugas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->integer('sti_id')->index();
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
