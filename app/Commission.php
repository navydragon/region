<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Commission extends Model
{
    protected  $fillable = ['title','description','start_at','end_at','status'];

    public function getStartAtAttribute()
    {
        return Carbon::parse($this->attributes['start_at']); 
    }
    public function getEndAtAttribute()
    {
        return Carbon::parse($this->attributes['end_at']); 
    }

  	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function user_pivot()
    {
        return $this->belongsToMany('App\User', 'commission_user');
    }

    public function non_admin_users()
    {
        return  $this->belongsToMany('App\User', 'commission_user')->withPivot('role_id')->wherePivot('role_id','=','3')->orWherePivot('role_id','=','4')->get();
    }

    public function common_users()
    {
       return  $this->belongsToMany('App\User', 'commission_user')->withPivot('role_id')->wherePivot('role_id','=','4')->get();
    }

    public function expert_users()
    {
       return  $this->belongsToMany('App\User', 'commission_user')->withPivot('role_id')->wherePivot('role_id','=','3')->get();
    }

    public function commission_stages()
    {
        return $this->hasMany('App\Commission_stage');
    }

    public function find_in_file_binds()
    {
        
        $binds = File_bind::where('bind_type', '=', 'commission')->where('type_id', '=',$this->id);
        return $binds;
    }

    public function get_status_name()
    {
        $status = $this->status;
        switch ($status) {
            case '1': $status_label = "Планируется"; break;
            case '2': $status_label = "Проводится"; break;
            case '3': $status_label = "Завершена"; break;
            default: $status_label = "Не определен"; break;
        }
        return $status_label;
    }

    public function check_match($status1,$status2)
    {
        if ($status1==$status2) {return true;}else{return false;}
    }
}

