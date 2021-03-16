<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="main">
            <div class = "input">
                <p>алгебраическая форма<br>комплексного числа: <i>z = a + bi</i></p>
                <form action="<?php __DIR__ ?>" method = "GET" >
                    <div class="line">
                        <span>z<sub>1</sub> =</span>
                        <input type = "number" name= "a1" placeholder="a">
                        <select name = "operation1">
                            <option value = "+">+</option>
                            <option value = "-">-</option>
                        </select>
                        <input type = "number" name= "b1" placeholder="b">
                        <span>i</span>
                    </div>
                    <div class="line">
                        <span>z<sub>2</sub> =</span>
                        <input type = "number" name= "a2" placeholder="a">
                        <select name = "operation2">
                            <option value = "+">+</option>
                            <option value = "-">-</option>
                        </select>
                        <input type = "number" name= "b2" placeholder="b">
                        <span>i</span>
                    </div>
                    <input type="submit" name="submit" value="Рассчитать">
                </form>
            </div>
            <div class ="output">
                <?php
                include 'classComplexNumber.php';  
                if (isset($_GET['submit'])) {


                    if (($_GET['a1'] == null) || ($_GET['b1'] == null) || ($_GET['a2'] == null) || ($_GET['b2'] == null)) {
                        echo 'Введите все значения!';
                        return;
                    }

                    $num1 = new ComplexNumber($_GET['a1'], $_GET['b1'], $_GET['operation1']);
                    $num2 = new ComplexNumber($_GET['a2'], $_GET['b2'], $_GET['operation2']);

                    echo 'z<sub>1</sub> = ' . $num1->algebraicForm();
                    echo '<br>';
                    echo 'z<sub>2</sub> = ' . $num2->algebraicForm();
                    echo '<br>';   
                    echo 'z<sub>1</sub> + z<sub>2</sub> = ' . ComplexNumber::summ($num1, $num2);
                    echo '<br>'; 
                    echo 'z<sub>1</sub> - z<sub>2</sub> = ' . ComplexNumber::minus($num1, $num2);
                    echo '<br>'; 
                    echo 'z<sub>1</sub> * z<sub>2</sub> = ' . ComplexNumber::multiply($num1, $num2);
                    echo '<br>'; 
                    echo 'z<sub>1</sub> / z<sub>2</sub> = ' . ComplexNumber::divide($num1, $num2);

                }
                ?>
            </div>
        </div>
    </body>
