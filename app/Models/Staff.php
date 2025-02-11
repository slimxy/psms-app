<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guard = 'staff';


    protected $fillable = [
        'open',
        'close',
        'type',
        'meterId',
        'diffs',
        'manager_id',
               
    ];
        // To Automaticaally cal the sales value

    public  static function boot(){
        parent::boot();

        static::saving(function ($staff) {
            $staff->diffs = max(0, $staff->close - $staff->open);
        });
    }
    // for  showing activity of each user by a manager

    public function manager(){
        return $this->belongTo(User::class,'manager_id');
    }
    // public function user(){
    //     return $this->belongTo(User::class,'user_id');
    // }
    // end showing activity of each user by a manager
    
    
}
