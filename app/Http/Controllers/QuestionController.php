<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use Illuminate\Support\Facades\Request;

class QuestionController extends Controller{

    private $testService;
    
    public function __construct(TestService $ts){
        $this->testService= $ts;
    }

    public function getQuestion(){
        $testID= Request::get('testID');
        $questionID= Request::get('questionID');
        $section= Request::get('section');
        $showReview= Request::get('showReview');
        if($showReview){

        }else{
            $res= $this->testService->getQuestionDetailsWithoutReview($testID,$questionID,$section);
            echo json_encode($res);
        }
    }    

}