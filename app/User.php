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
        'name', 'email', 'password',
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

    public function survey_questions_pivot()
    {
        return $this->belongsToMany('App\Survey_question', 'survey_question_user')->withPivot('answer')->withTimestamps();
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
        return $this->name;
    }
}

