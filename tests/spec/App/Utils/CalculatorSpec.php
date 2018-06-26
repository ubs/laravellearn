<?php

namespace spec\App\Utils;

use App\Utils\Calculator;
use PhpSpec\ObjectBehavior;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Calculator::class);
    }
    
    function it_should_have_zero_result_when_created(){
        $this->getResult()->shouldBe(0);
    }
    
    function it_should_perform_operation_and_return_a_calculator_object(){
        $this->sum(0)->shouldBeAnInstanceOf(Calculator::class);
        $this->multiply(0)->shouldBeAnInstanceOf(Calculator::class);        
    }
    
    function it_should_perform_multiple_different_operations_in_a_chain(){
        $this->sum(10, 10)->multiply(5)->getResult()->shouldBe(100);
    }
    
    function it_should_sum_a_single_number_and_return_the_same_number(){
        $this->sum(10)->getResult()->shouldBe(10);
    }
    
    function it_should_sum_two_numbers_and_return_the_correct_result(){
        $this->sum(6, 9)->getResult()->shouldBe(15);
    }
    
    function it_should_chain_sum_a_series_of_single_numbers(){
        $this->sum(5)->sum(10)->sum(15)->sum(20)->getResult()->shouldBe(50);
    }
    
    function it_should_reset_result_when_passed_two_numbers_to_sum(){
        $this->sum(5)->sum(10)->sum(15,20)->getResult()->shouldBe(35);
        $this->sum(5)->sum(10)->sum(15,20)->sum(35)->getResult()->shouldBe(70);
    }
    
    function it_should_sum_negative_numbers(){
        $this->sum(-5)->getResult()->shouldBe(-5);
    }
    
    function it_should_multiply_a_single_number_and_return_zero_when_result_is_zero(){
        $this->multiply(10)->getResult()->shouldBe(0);
    }
    
    function it_should_multiply_a_single_number_and_return_the_correct_result_when_result_is_not_zero(){
        $this->sum(1)->multiply(10)->getResult()->shouldBe(10);
    }
    
    function it_should_multiply_two_numbers_and_return_the_correct_result(){
        $this->multiply(7, 7)->getResult()->shouldBe(49);
    }
    
}
