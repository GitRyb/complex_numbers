<?php

class ComplexNumber {
    
    private $a;
    private $b;
    private $divisor;
    
    public function __construct(int $a,int $b, $localOperation,int $divisor = 1) {
        $this->a = $a;
        switch ($localOperation) {
            case '-':
                $this->b = - $b;
                break;
            case '+':
                $this->b = $b;
                break;
        }
        $this->divisor = $divisor;
    }
    
    public function algebraicForm () {
        if ($this->a == 0) {
            switch ($this->b) {
                case 0:
                    $result = 0;
                    return $result;                    
                case 1: 
                    $result = 'i';
                    if ($this->divisor > 1) {
                        $result = 'i / ' . $this->divisor;
                    }
                    return $result;
                case -1:
                    $result = '-i';
                    if ($this->divisor > 1) {
                        $result = '-i / ' . $this->divisor;
                    }
                    return $result;
                default :
                    $result = $this->b . 'i';
                    if ($this->divisor > 1) {
                        if ($this->b % $this->divisor === 0){
                            $result = $this->b / $this->divisor;
                        } else {
                            $result = $this->b . ' / ' . $this->divisor;
                        }
                    }
                    return $result;
            }           
        }
        if ($this->a != 0) {
            switch ($this->b) {
                case 0:
                    $result = $this->a;
                    if ($this->divisor > 1) {
                        if ($this->a % $this->divisor === 0) {
                            $result = $this->a / $this->divisor;
                        } else {
                            $result = $this->a . ' / ' . $this->divisor;
                        }
                    }
                    return $result;                    
                case 1: 
                    $result = $this->a . ' + ' . 'i';
                    if ($this->divisor > 1) {
                        $result = '(' . $this->a . ' +  i)' . ' / ' . $this->divisor;
                    }
                    return $result;
                case -1:
                    $result = $this->a . ' - ' . 'i';
                    if ($this->divisor > 1) {
                        $result = '(' . $this->a . ' - ' . 'i) / ' . $this->divisor;
                    }
                    return $result;
                default :
                    if ($this->b > 0) {
                        $result = $this->a . ' + ' . $this->b . 'i';
                        if ($this->divisor > 1) {
                            $result = '(' . $this->a . ' + ' . $this->b . 'i) / ' . $this->divisor;
                        }
                    } else {
                        $result = $this->a . ' - ' . abs($this->b) . 'i';
                        if ($this->divisor > 1) {
                            $result = '(' . $this->a . ' - ' . abs($this->b) . 'i) / ' . $this->divisor;
                        }
                    }
                    return $result;
            }          
        }
    }
    
    public static function summ (ComplexNumber $example1, ComplexNumber $example2) {
        $aSumm = $example1->a + $example2->a;
        $bSumm = $example1->b + $example2->b;
        
        $result = new self($aSumm, $bSumm, '+');
        return $result->algebraicForm();
    }
    
    public static function minus (ComplexNumber $example1, ComplexNumber $example2) {
        $aMinus = $example1->a - $example2->a;
        $bMinus = $example1->b - $example2->b;

        $result = new self($aMinus, $bMinus, '+');
        return $result->algebraicForm();
    }
    
    public static function multiply (ComplexNumber $example1, ComplexNumber $example2) {
        $a1a2 = $example1->a * $example2->a;
        $a2b1 = $example2->a * $example1->b;
        $a1b2 = $example1->a * $example2->b;
        $b1b2 = -($example1->b * $example2->b);
        
        $firstHalf = $a1a2 + $b1b2;
        $secondHalf = $a1b2 + $a2b1;
 
        $result = new self($firstHalf, $secondHalf, '+');
        return $result->algebraicForm();
    }
    
    public static function divide (ComplexNumber $example1, ComplexNumber $example2) {
        $divisor = pow($example2->a, 2) + pow($example2->b, 2);
        if ($divisor === 0) {
            $result = 'Ошибка: Деление на ноль невозможно';
            return $result;
        }
        $a1a2 = $example1->a * $example2->a;
        $a2b1 = $example2->a * $example1->b;
        $a1b2 = $example1->a * (-$example2->b);
        $b1b2 = -($example1->b * (-$example2->b));
        
        $firstHalf = $a1a2 + $b1b2;
        $secondHalf = $a1b2 + $a2b1;
        
        $result = new self($firstHalf, $secondHalf, '+', $divisor);
        return $result->algebraicForm();        
    }
}