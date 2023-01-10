<?php

    $qtd_alunos = $_POST['alunos'];

     //cria uma classe do tipo aluno
     class Aluno{
        public $nome;
        public $regiao;
        public $distancia;
    }
    $incorretos = 0; //variável criada para contar quantos cadastros incorretos existem
    for($i = 0 ; $i < $qtd_alunos; $i++){
        $aluno = $_POST["alunos$i"];
       
        if(!validar($aluno)){
            $incorretos++;
        }else{
            //preencher um array do tipo Aluno
            $novoaluno = new Aluno();
            $novoaluno->nome = getNome($aluno);
            $novoaluno->regiao = getRegiao($aluno);
            $novoaluno->distancia = getDistancia($aluno);
            //adiciona os alunos em um Array
            $colecaoAlunos[$i] = $novoaluno;
        }
    }

    //informa ao usuário quantos cadastros ele preencheu incorretamente
    if($incorretos > 0){
        echo "Existe(m) $incorretos cadastro(s) incorreto(s) que não será(ão) considerado(s)<br><br>";
    }

    //ordenando pelas ordens de distância, região e nome
    //essa função deu muito trabalho, só Jesus
    usort($colecaoAlunos,function($a,$b){
       if(($a->distancia - $b->distancia) != 0){
        return $a->distancia > $b->distancia;
       }else if(strcmp($a->regiao, $b->regiao) != 0){
        return strcmp($a->regiao, $b->regiao);
       }else{
        return strcmp($a->nome, $b->nome);
       }
    });

    //imprime os nomes dos alunos na ordem certa
    for($i = 0; $i < count($colecaoAlunos); $i++){
        echo $colecaoAlunos[$i]->nome;
        echo "<br>";
    }

    //essa função valida se os dados do aluno foram corretamente preenchidos
    function validar($aluno){
        $input = explode(" ",$aluno);
        $regiao = $input[1];
        $distancia = $input[2];

        //força letra maiúscula
        $regiao = strtoupper($regiao);

        if($regiao != 'L' && $regiao != 'N' && $regiao != 'O' && $regiao != 'S'){
            return false;
        }
        if(!is_numeric($distancia)){
            return false;
        }
        return true;
    }
    //pega o nome do aluno
    function getNome($aluno){
        $input = explode(" ",$aluno);
        return $input[0];
    }
    //pega a região do aluno
    function getRegiao($aluno){
        $input = explode(" ",$aluno);
        return $input[1];
    }
    //pega a distância do aluno
    function getDistancia($aluno){
        $input = explode(" ",$aluno);
        $distancia = intval($input[2]);
        return $distancia;
    }

    

    echo "<br><input type='button' value='Voltar' onclick='history.back()'>";
?>