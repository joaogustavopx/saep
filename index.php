<?php
        
        include './model/conexao.php';
        include './model/concessionaria.php';
        include './model/alocacao.php';
        include './model/automoveis.php';
        include './model/clientes.PHP';
        include './model/venda.PHP';
        include './control/controller.php';

        /*$c = new controller();
        
        $c->index();
        
        if($c->cadastroIndex) echo $c->cadastroIndex;
        if($c->loginIndex) echo $c->loginIndex;*/
         
        /*$a = new Concessionaria();
        print_r ($a->cadastraConcessionaria(1, "Atena concessionaria"));*/ 

        /* $b = new alocacao();
<<<<<<< HEAD
        print_r ($b->cadastraAlocacao(1,1,1,1,1));
 */
        /* $c = new Automoveis();
        print_r ($c->cadastraAutomovel(1,"Toyota Supra", 15000000,2)); */
  
        /*$d = new Clientes();
        print_r ($d->cadastraCliente(1, "amanda")); */ 

         $e = new Venda();
        print_r ($e->cadastraVenda(1,1,1));
=======
        print_r ($b->cadastraAlocacao(1,1,1,1,1));  */

         /* $c = new automoveis();
        print_r ($c->cadastraAutomovel(1,"Toyota Supra", 15000000,1));
  */
        /*$d = new Clientes();
        print_r ($d->cadastraCliente(1, "amanda")); */ 

        $e = new Venda();
        print_r ($e->cadastraVenda(1,1,1)); 
>>>>>>> 2ff7f3cf2a363920a21716fe7c9e3bee41f39101

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