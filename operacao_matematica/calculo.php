<?php

    $testes = $_POST['testes'];

    //converte para inteiro
    $testes = intval($testes);

    //só permite intervalo entre 1 e 104 no número de testes
    if($testes < 1 || $testes > 104){
        echo "Por favor, digite um valor entre 1 e 104";
    }
    else{
        echo "<form method=post action='resultados.php'>";
        echo "Quantidade de testes: <b><input type='text' name='testes' id='testes' 
        value = $testes size='4' readonly></b>";
        echo "<br><br>Formato das expressões: <b>número/número</b>";
        echo "<br><br>Os números devem estar entre 1 e 1000";
        
        //variavel criada para controlar a criação dos elementos
        $indiceelementos = 0;
        for($i = 0; $i < $testes; $i++){
            //chama a função passando os indices
            $indiceelementos++;
            lerExpressao($indiceelementos,$i+1);
            $indiceelementos++;
        }
        echo "<br><br><input type='submit' value='Calcular equações'>";
        echo "</form>";
    }

    function lerExpressao($indice,$iteracao){
        echo "<br><br><b>Teste #$iteracao</b>";
        echo "<br><br><b>Digite a primeira divisão:</b>";
        echo "<br><br><input type='text' name='expressao$indice' id='expressao$indice' pattern='[0-9]{1,4}/[0-9]{1,4}' required>";
        echo "<br><br>Selecione a operação ";
        echo "<select id='operacao$iteracao' name='operacao$iteracao' required>";
        echo "<option value='soma'>+</option>
              <option value='subtracao'>-</option>
              <option value='multiplicacao'>*</option>
              <option value='divisao'>/</option>";
        echo "</select>";
        echo "<br><br><b>Digite a segunda divisão:</b>";
        $temp = $indice + 1;
        echo "<br><br><input type='text' name='expressao$temp' id='expressao$temp' pattern='[0-9]{1,4}/[0-9]{1,4}' required>";
    }
    

    echo "<br><input type='button' value='Nova operação' onclick='history.back()'>";
?>