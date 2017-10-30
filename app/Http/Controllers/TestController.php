<?php

namespace App\Http\Controllers;


use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Support\Facades\Request;
use App\Services\TestService;
use App\TestSeries;
use App\Test;
use App\Question;
use App\CandidateResponse;

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

    public function createQuestion($userName,$password){
        if($userName=='gatestack' && $password== 'gATESTACKBlog123@mty'){
            $todaysDate= \Carbon\Carbon::now('Asia/Kolkata')->toDateTimeString();
            $tests= Test::where( 'date','>', $todaysDate)->get();
            $questionID= Request::get('questionID');
            if($questionID){
                $questionObj= Question::where('id',$questionID)->get();
                $questionObj= $questionObj->toArray();
                $questionObj= $questionObj[0];
            }else{
                $questionObj= NULL;
            }
            return view('postQuestion',['tests'=>$tests,'questionObj'=>$questionObj]);
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

    public function saveQuestion(){
        $questionArr= Request::get('question');
        $questionID= Request::get('questionID');
        if($questionID){
            $q= Question::where('id',$questionID)->first();
            $q->createFromArray($questionArr);
            $q->save();
        }else{
            $q= new Question();
            $q->createFromArray($questionArr);
            $q->save();
        }
        echo "Done";
    }
    
    public function getTestStatus(){
        $testCandidateID= 1;//Request::get('testCandidateID');
        $testID= 3;//Request::get('testID');
        $questionID= 2;//Request::get('questionID');
        $section= "Core";//Request::get('section');
        
        $cr= CandidateResponse::where('testCandidateID',$testCandidateID)->where('testID',$testID)
                ->where('questionID',$questionID)->where('section',$section)
                ->get();
        var_dump($cr->toArray());
    }
    
    public function saveTestStatus(){
        $params=[];
        $params['testCandidateID']= 1;//Request::get('testCandidateID');
        $params['testID']= 3;//Request::get('testID');
        $params['questionID']= 2;//Request::get('questionID');
        $params['section']= "Core";//Request::get('section');
        $params['candidateResponse']= 'a';//Request::get('candidateResponse');
        
        $candidateResponse= new CandidateResponse();
        $candidateResponse->createFromArray($params);
        $candidateResponse->save();
    }
	
}