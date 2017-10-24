<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestSeries extends Model
{
    protected $table = 'testSeries';

    function tests(){
    	return $this->hasMany('App\Test','seriesID','id');
    }
    
    function createFromArray($arr){
    	foreach ($arr as $key => $value) {
            if($value && $key!='_token'){
                $this->$key=$value;
            }
    	}
    	return $this;
    }
}
