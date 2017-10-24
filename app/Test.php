<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $table = 'test';

	function testSeries(){
		return $this->belongsTo('App\TestSeries', 'seriesID','id');
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
