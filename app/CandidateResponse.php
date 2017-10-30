<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateResponse extends Model
{
    protected $table = 'candidate_responses';
    
    function createFromArray($arr){
    	foreach ($arr as $key => $value) {
            if($value && $key!='_token'){
                $this->$key=$value;
            }
    	}
    	return $this;
    }


}
