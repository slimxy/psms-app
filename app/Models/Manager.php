<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $guard = 'Admin';

    protected $fillable = [
        'submission_id',
        'opening',
        'closing',
        'return',
        'sales',
        'stock',
        'product',
        'total',
        'physical',
               
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }


// for  list of users registered by a manager
    // public function users(){
    //     return $this->hasMany(User::class, 'manager_id');
    // }

// end user list for manager



}
