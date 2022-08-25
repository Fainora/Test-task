<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $guarded = false;
    public $timestamps = false;

    public function lead()
    {
        return $this->hasOne(Lead::class);
    }

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class, 'pipeline_id', 'id');
    }
}
