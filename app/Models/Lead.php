<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    protected $guarded = false;
    public $timestamps = false;



    public function account()
    {
        return $this->belongsTo(User::class, 'account_id', 'id');
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id', 'id');
    }

    public function responsible_user()
    {
        return $this->belongsTo(User::class, 'responsible_user_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'linked_company_id', 'id');
    }

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class, 'pipeline_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
