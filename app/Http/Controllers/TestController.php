<?php

namespace App\Http\Controllers;


use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Support\Facades\Request;
use App\Services\TestService;
use App\TestSeries;

class TestController extends Controller{
    
    private $testService;
    
    public function __construct(TestService $ts) {
        $this->testService= $ts;
    }

    public function createTestSeries($userName,$password){
        if($userName=='gatestack' && $password== 'gATESTACKBlog123@mty'){
            $testSeriesID= Request::get('seriesID');
            if($testSeriesID){
                $seriesObj= TestSeries::find($testSeriesID);
            }else{
                $seriesObj=NULL;
            }
            return view('testSeriesAdmin',['seriesObj'=>$seriesObj]);
        }else{
            abort(404);
        }
    }

    public function saveTestSeries(){
        $seriesID= Request::get('seriesID');
        $testSeriesArr= Request::get('testSeries');
        $testArr= Request::get('test');
        if($seriesID){
            $this->testService->updateTestSeries($seriesID,$testSeriesArr,$testArr);
        }else{
            
            $this->testService->generateTestSeries($testSeriesArr,$testArr);
        }
    }
	
}