<?php

namespace App\Utils;


class Calculator
{
    private $result;
    
    function __construct() {
        $this->setResult(0);
    }
    
    /**
     * Sums two numbers and return a Calculator object
     * @param First number to sum $num1
     * @param Second number to sum, uses previous result if not specified $num2
     * @return \App\Utils\Calculator
     */
    public function sum($num1, $num2=0){
        $this->performOperation(ICalcOperation::SUM, $num1, $num2);
        return $this;
    }
    
    public function multiply($num1, $num2=0){
        $this->performOperation(ICalcOperation::MULTIPLY, $num1, $num2);
        return $this;
    }
    
    private function performOperation($operation, $num1, $num2) {
        $result = 0;
        if (empty($num2)) { $num2 = $this->getResult(); }
        
        switch ($operation) {
            case ICalcOperation::SUM:
                $result = ($num1 + $num2);
                break;

            case ICalcOperation::MULTIPLY:
                $result = ($num1 * $num2);
                break;
        }
        
        $this->setResult($result);
    }
    
    /**
     * @param mixed $result
     */
    private function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

}
