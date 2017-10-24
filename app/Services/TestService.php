<?php

namespace App\Services;

use App\TestSeries;
use App\Test;

class TestService {
    
    function generateTestSeries($testSeriesArr,$testArr){
    	$testSeiesObj= new TestSeries();
    	$testSeiesObj= $testSeiesObj->createFromArray($testSeriesArr);
    	$testSeiesObj->save();
    	foreach($testArr as $t){
    		$testObj= new Test();
    		$testObj= $testObj->createFromArray($t);
    		$testSeiesObj->tests()->save($testObj);
    	}
    }

    function updateTestSeries($seriesID,$testSeriesArr,$testArr){
    	$seriesObj= TestSeries::find($seriesID);
    	foreach ($seriesObj->tests as $t) {
    		$t->delete();
    	}
    	foreach($testArr as $t){
    		$testObj= new Test();
    		$testObj= $testObj->createFromArray($t);
    		$seriesObj->tests()->save($testObj);
    	}
    }
}
