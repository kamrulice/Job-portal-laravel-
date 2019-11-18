<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Job extends Model
{
    protected $guarded = [];
    public function getRouteKeyName() {
       return 'slug';
    }
    public function company(){
        return $this->belongsTo('App\Company');
    }
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication(){
        return DB::table('job_user')->where('user_id',Auth::user()->id)
                ->where('job_id',$this->id)->exists();
    }
}
