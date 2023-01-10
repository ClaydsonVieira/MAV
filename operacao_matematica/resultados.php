<?php
    $qtd_testes = $_POST['testes'];

    $qtd_testes = intval($qtd_testes);

    //armazenamos os valores das operações e das expressões em arrays
    for($i = 0; $i < $qtd_testes; $i++){
        $indiceoperacao = $i + 1;
        $operacao[$i] = $_POST["operacao$indiceoperacao"];
    }

    $qtd_expressoes = $qtd_testes * 2;
    //como cada teste tem duas operações, é necessário multiplicar a quantidade por 2
    for($i = 0; $i < $qtd_expressoes; $i++){
        $indiceexpressao = $i + 1;
        $expressao[$i] = $_POST["expressao$indiceexpressao"];
    }

    //agora fazemos o cálculo
    $indiceexpressao = 0;

    for($i = 0; $i < count($operacao); $i++){
        calculo($expressao[$indiceexpressao],$expressao[$indiceexpressao + 1],$operacao[$i]);
        $indiceexpressao+=2; //faz os cálculos do terceiro elemento em diante
    }
    

    function calculo($expressao1, $expressao2, $operacao){
        //a função explode separa os valores usando um caractere específico
        $valores = explode("/",$expressao1);
        $n1 = $valores[0];
        $d1 = $valores[1];

        $valores = explode("/",$expressao2);
        $n2 = $valores[0];
        $d2 = $valores[1];

        //a função strcmp compara duas strings e return 0 quando são iguais
        if(strcmp($operacao,"soma") == 0){
            $numerador = ($n1*$d2 + $n2*$d1);
            $denominador = ($d1*$d2);
            echo "$numerador/$denominador ";
            //armazena o resultado da simplificação nesta variável
            $simplificado = simplificar($numerador,$denominador);
            //se o primeiro valor retornado for igual ao numerador, não houve simplificação
            if($simplificado[0] == $numerador){
                echo "Não é possível simplificar";
            }else{
                echo  "= $simplificado[0]/$simplificado[1]<br><br>";
            }
            
        }else if(strcmp($operacao,"subtracao") == 0){
            $numerador = ($n1*$d2 - $n2*$d1);
            $denominador = ($d1*$d2);
            echo "$numerador/$denominador ";
            $simplificado = simplificar($numerador,$denominador);
            //se o primeiro valor retornado for igual ao numerador, não houve simplificação
            if($simplificado[0] == $numerador){
                echo "Não é possível simplificar";
            }else{
                echo  "= $simplificado[0]/$simplificado[1]<br><br>";
            }
        }else if(strcmp($operacao,"multiplicacao") == 0){
            $numerador = ($n1*$n2);
            $denominador = ($d1*$d2);
            echo "$numerador/$denominador ";
            $simplificado = simplificar($numerador,$denominador);
            //se o primeiro valor retornado for igual ao numerador, não houve simplificação
            if($simplificado[0] == $numerador){
                echo "Não é possível simplificar";
            }else{
                echo  "= $simplificado[0]/$simplificado[1]<br><br>";
            }
        }else{
            $numerador = ($n1*$d1);
            $denominador = ($n2*$d1);
            echo "$numerador/$denominador ";
            $simplificado = simplificar($numerador,$denominador);
            //se o primeiro valor retornado for igual ao numerador, não houve simplificação
            if($simplificado[0] == $numerador){
                echo "Não é possível simplificar";
            }else{
                echo  "= $simplificado[0]/$simplificado[1]<br><br>";
            }
        }
    }
    //achamos o maior divisor dos dois números
    function mdc($m, $n){
          return $n ? mdc($n, $m % $n) : $m;
    }

    function simplificar($numerador, $denominador){
        $mdc = mdc($numerador,$denominador);
        //caso o valor da fração seja negativo
        if ($numerador < 0)
        {
            return [-$numerador / $mdc, -$denominador / $mdc]; 
        }else{
            return [$numerador / $mdc, $denominador / $mdc];
        }
    }

    echo "<br><br><input type='button' value='Voltar' onclick='history.back()'>";
?>