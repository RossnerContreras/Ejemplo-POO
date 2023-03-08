<!DOCTYPE html>
<html>
<head>
  <title>Ejemplo Banco POO</title>
</head>
<body>
  <pre>
    <?php
        require_once 'clases.php';
        $p1=new ContaBanco(); //Creando una cuenta CC
        //print_r($p1);
        $p1->setnumConta(1111);
        $p1->abrirConta("CC");
        $p1->setdono("Juan");
        //print_r($p1);
        $p1->depositar(300);
        //print_r($p1);
        $p1->pagarMensal();
        //print_r($p1);
        $p1->sacar(338);
        $p1->fecharConta();
        print_r($p1);
        echo "<br/>";

        $p2=new ContaBanco(); //Creando una cuenta CP
        //print_r($p2);
        $p2->setnumConta(2222);
        $p2->abrirConta("CP");
        $p2->setdono("Carla");
        //print_r($p2);
        $p2->depositar(500);
        //print_r($p2);
        $p2->sacar(630);
        //print_r($p2);
        $p2->pagarMensal();
        //print_r($p2);
        $p2->fecharConta();
        print_r($p2);
    ?>
  </pre>
</body>
</html>