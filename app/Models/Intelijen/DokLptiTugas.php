<?php

namespace App\Models\Intelijen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokLptiTugas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dok_lpti_tugas';

    protected $fillable = [
        'tugasable_type',
        'tugasable_id',
        'tugas',
    ];

    public function tugasable()
    {
        return $this->morphTo();
    }
}
