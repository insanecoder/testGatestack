<?php

namespace App\Services;

use App\TestCandidates;

class PaymentService {
    
    public function createOrder($params) {
        $testCandidates= new TestCandidates();
        $testCandidates->createFromArray($params);
        $testCandidates->transactionStatus='Y';
        $testCandidates->save();
    }
}
