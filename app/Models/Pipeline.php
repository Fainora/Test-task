<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    protected $table = 'pipelines';
    protected $guarded = false;
    public $timestamps = false;

    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function lead()
    {
        return $this->hasOne(Lead::class);
    }
}
