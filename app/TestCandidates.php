<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCandidates extends Model
{
    protected $table = 'testCandidates';
    
    function createFromArray($arr){
    	foreach ($arr as $key => $value) {
            if($value && $key!='_token'){
                $this->$key=$value;
            }
    	}
    	return $this;
    }
}
