<?php
    $notas = $_POST['notas'];

    //converte para float
    $notas = floatval($notas);

    //para o cálculo abaixo, é necessário arredondar para baixo usando floor
    //calcula quantas notas de 100 vai usar e atualiza o valor de notas
    $notas100 = floor($notas/100);
    $notas -= $notas100*100;
    //calcula quantas notas de 50 vai usar e atualiza o valor de notas
    $notas50 = floor($notas/50);
    $notas -= $notas50*50;

    //calcula quantas notas de 20 vai usar e atualiza o valor de notas
    $notas20 = floor($notas/20);
    $notas -= $notas20*20;

     //calcula quantas notas de 10 vai usar e atualiza o valor de notas
     $notas10 = floor($notas/10);
     $notas -= $notas10*10;

     //calcula quantas notas de 10 vai usar e atualiza o valor de notas
     $notas10 = floor($notas/10);
     $notas -= $notas10*10;

     //calcula quantas notas de 5 vai usar e atualiza o valor de notas
     $notas5 = floor($notas/5);
     $notas -= $notas5*5;

      //calcula quantas notas de 2 vai usar e atualiza o valor de notas
      $notas2 = floor($notas/2);
      $notas -= $notas2*2;

      //moedas
      //calcula quantas moedas de 1 vai usar e atualiza o valor de notas
      $moedas1 = floor($notas/1.00);
      $notas -= $moedas1*1.00;

      //calcula quantas moedas de 0.5 vai usar e atualiza o valor de notas
      $moedas05 = floor($notas/0.5);
      $notas -= $moedas05*0.5;

      //calcula quantas moedas de 0.25 vai usar e atualiza o valor de notas
      $moedas025 = floor($notas/0.25);
      $notas -= $moedas025*0.25;

      //calcula quantas moedas de 0.10 vai usar e atualiza o valor de notas
      $moedas010 = floor($notas/0.1);
      $notas -= $moedas010*0.1;

      //calcula quantas moedas de 0.05 vai usar e atualiza o valor de notas
      $moedas005 = floor($notas/0.05);
      $notas -= $moedas005*0.005;

      //calcula quantas moedas de 0.01 vai usar, não é mais necessário atualizar o valor
      $moedas001 = floor($notas/0.01);

      //imprimir a quantidade de moedas e notas
      
      echo "NOTAS:<br><br>";

      echo "$notas100 nota(s) de R$ 100.00 <br><br>";
      echo "$notas50 nota(s) de R$ 50.00 <br><br>";
      echo "$notas20 nota(s) de R$ 20.00 <br><br>";
      echo "$notas10 nota(s) de R$ 10.00 <br><br>";
      echo "$notas5 nota(s) de R$ 5.00 <br><br>";
      echo "$notas2 nota(s) de R$ 2.00 <br><br>";

      echo "MOEDAS:<br><br>";

      echo "$moedas1 moeda(s) de R$ 1.00 <br><br>";
      echo "$moedas05 moeda(s) de R$ 0.50 <br><br>";
      echo "$moedas025 moeda(s) de R$ 0.25 <br><br>";
      echo "$moedas010 moeda(s) de R$ 0.10 <br><br>";
      echo "$moedas005 moeda(s) de R$ 0.05 <br><br>";
      echo "$moedas001 moeda(s) de R$ 0.01 <br><br>";

      echo "<input type='button' value='Nova consulta' onclick='history.back()''>";
?>