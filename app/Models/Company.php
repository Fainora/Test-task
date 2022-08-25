<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $guarded = false;
    public $timestamps = false;

    public function lead()
    {
        return $this->hasOne(Lead::class);
    }

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
}
