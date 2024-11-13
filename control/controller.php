<?php

class Controller{
    
    public $cadastroIndex = false;
    public $loginIndex = false;
  
  public function index(){
      if($_SERVER['REQUEST_METHOD'] == "POST"){
          
          if(isset($_POST['cadastrar'])){
              
              $id=$_POST['id'];
              $concessionaria=$_POST['concessionaria'];
              
              $concessionaria = new concessionaria();
              $this->cadastroIndex = $concessionaria->cadastraConcessionaria($id,$concessionaria);
          }
        
          if(isset($_POST['login'])){
              
             $id=$_POST['id'];
             $concessionaria=$_POST['concessionaria'];
             $login= new concessionaria();
             
             if($login->validaConcessionaria($id, $concessionaria)>0){
                 header('Location:concessionaria.PHP');
                 exit;
             }else{
                 $this->loginIndex = "Dados Invalidos";
             }         
          }
      }
  }
}


?>