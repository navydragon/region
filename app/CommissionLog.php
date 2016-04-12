<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionLog extends Model
{
    protected  $fillable = ['commission_id','user_id','text','ip_adress','type','type_id',]; 

    public function label()
    {
    	switch ($this->type) {
    		case 'join':
    			return '<span class="label"><i class="fa fa-user-plus size-20 color-blue "></i></span>';
    			break;

			case 'leave':
    			return '<span class="label"><i class="fa fa-user-times size-20 color-red "></i></span>';
    			break;

    		case 'survey':
    			return '<span class="label"><i class="fa fa-edit size-20 color-blue "></i></span>';
    			break;

    		case 'user_task':
    			return '<span class="label"><i class="fa fa-upload size-20 color-blue "></i></span>';
    			break;	

    		case 'test':
    			return '<span class="label"><i class="fa fa-tasks size-20 color-blue "></i></span>';
    			break;	
    		
    		default:
    			# code...
    			break;
    	}
    }
}
