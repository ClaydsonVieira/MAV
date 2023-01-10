<?php
    $dias = $_POST['dias'];

    //converte para int
    $dias = intval($dias);

    //para o cálculo abaixo, é necessário arredondar para baixo usando floor
    //calcula quantos anos e atualiza o valor de dias
    $ano = floor($dias/365);
    $dias -= $ano*365;

    //calcula quantos meses e atualiza o valor de dias
    $mes = floor($dias/30);
    $dias -= $mes*30;


    //imprimir a quantidade de moedas e notas

    echo "$ano ano(s) <br><br>";
    echo "$mes mes(es) <br><br>";
    echo "$dias dia(s) <br><br>";

    echo "<input type='button' value='Nova consulta' onclick='history.back()''>";
?>