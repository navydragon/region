<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'surname', 'name','fathername', 'email', 'password','filial_id','job_id','phone','mailing'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function surveys()
    {
        return $this->hasMany('App\Survey');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function commissions()
    {
        return $this->hasMany('App\Commission');
    }

    public function commissions_pivot()
    {
        return $this->belongsToMany('App\Commission', 'commission_user')->withTimestamps();
    }

    public function in_commission($commission)
    {
        return $this->belongsToMany('App\Commission', 'commission_user')->where('id','=',$commission)->get()->count();
    }

    public function survey_questions_pivot()
    {
        return $this->belongsToMany('App\Survey_question', 'survey_question_user')->withPivot('answer')->withTimestamps();
    }

    public function test_user_pivot()
    {
        return $this->belongsToMany('App\Test', 'test_users')->withPivot(['id','earned','total','start_at','end_at'])->withTimestamps();
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function file_binds($type)
    {
        return $this->hasManyThrough('App\File_bind','App\File')->where('bind_type','=',$type);
    }

    public function short_name()
    {
        return $this->surname." ".mb_substr($this->name,0,1,'UTF-8').". ".mb_substr($this->fathername,0,1,'UTF-8').".";
    }

    public function full_name()
    {
        return $this->surname." ".$this->name." ".$this->fathername;
    }

    public function filial()
    {
        return $this->belongsTo('App\Filial');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function is_admin()
    {
        if (($this->global_role_id == 2)||($this->global_role_id == 3)) {return true;}else{return false;}
    }

    public function event_mark($event)
    {
        $mark = Event_mark::where('user_id','=', $this->id)->where('event_id','=',$event);
        if ($mark->count() > 0 )
        {
            return $mark->first()->mark;
        }else{
            return '-';
        }
    }
    public function test_attempts($test)
    {
        return Test_user::where('user_id','=', $this->id)->where('test_id','=',$test);
    }
}

