<?php
        
        include './model/conexao.php';
        //include './model/concessionaria.php';
        //include './model/alocacao.php';
        include './model/automoveis.php';
        //include './model/clientes.PHP';
        //include './model/venda.PHP';
        //include './control/controller.php';

        /*$c = new controller();
        
        $c->index();
        
        if($c->cadastroIndex) echo $c->cadastroIndex;
        if($c->loginIndex) echo $c->loginIndex;*/
         
        /*$a = new Concessionaria();
        print_r ($a->cadastraConcessionaria(1, "Atena concessionaria"));*/ //funcionando

        /*$b = new alocacao();
        print_r ($b->cadastraAlocacao(2,3,4,5,1));*/ //funcionando

        $c = new automoveis();
        print_r ($c->cadastraAutomovel(1,"Fiat uno", 43.115)); 

        /*$d = new Clientes();
        print_r ($d->cadastraCliente(1, "amanda")); */ //funcionando

        /*$e = new venda();
        print_r ($e->cadastraVenda(3,4,5)); //erro
        //echo "aqui";*/

        



?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>saep</title>
</head>
<body>       
</body>
</html> -->