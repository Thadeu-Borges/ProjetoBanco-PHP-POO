<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre> 
        <?php
        // put your code here
        require_once 'ContaBanco.php';
        $p1 = new ContaBanco();//Jubileu
        $p2 = new ContaBanco();//Creuza
        
        $p1->abrirConta("CC");
        $p1->setNumConta(1111);
        $p1->setDono("Jubileu");
        
        $p2->abrirConta("CP");
        $p2->setNumConta(2222);
        $p2->setDono("Creuza");
        
        $p1->depositar(300);
        $p2->depositar(500);
        
        $p2->sacar(1000);
        
        $p1->pagarMensal();
        $p2->pagarMensal();
        
        $p1->sacar(338);
        $p2->sacar(630);
        
        $p1->fecharConta();
        $p2->fecharConta();
        
        print_r($p1);
        print_r($p2);
        
        ?>
        </pre>
    </body>
</html>
