<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
class File extends Model
{
    

	public function upload($file) 
	{
	  // getting all of the post data
	  //$file = array('image' => Input::file('image'));
	  // setting up rules
	  //$rules = array('file' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
	  // doing the validation, passing post data, rules and the messages
	  //$validator = Validator::make($file, $rules);
	  //if ($validator->fails()) {
	    // send back to the page with the input data and errors
	  //  return back()->withInput()->withErrors($validator);
	  //}
	  //else {
	    // checking file is valid.
	    if ($file->isValid()) {
	      $destinationPath = 'uploads'; // upload path
	      $extension = $file->getClientOriginalExtension(); // getting image extension
	      $fileName = rand(11111,99999).'.'.$extension; // renameing image
	      $file->move($destinationPath, $fileName); // uploading file to given path
	      // sending back with message
	      //Session::flash('success', 'Upload successfully'); 
	      return  $destinationPath.'/'.$fileName;
	    }
	    else {
	      // sending back with error message.
	      //Session::flash('error', 'uploaded file is not valid');
	      flash()->error('Ошибка валидации');
	      return back();
	    }
	//  }
	}

	public function file_binds()
    {
        return $this->hasMany('App\File_bind');
    }

    public function thumbnail()
    {
    	switch ($this->type) {
    		case 'xls':
    		case 'xlsx':
    			return "<i class='fa fa-file-excel-o'></i>";
    			break;
    		
    		case 'doc':
    		case 'docx':
    			return "<i class='fa fa-file-word-o'></i>";
    			break;

    		case 'png':
   			case 'gif':
   			case 'jpeg':
   			case 'jpg':
    			return "<i class='fa fa-file-image-o'></i>";
    			break;

    		case 'zip':
    		case 'rar':
    			return "<i class='fa fa-file-archive-o'></i>";
    			break;
    		case 'pdf':
    			return "<i class='fa fa-file-pdf-o'></i>";
    			break;
    		default:
    			return "<i class='fa fa-file'></i>";
    			break;
    	}
    }
}
