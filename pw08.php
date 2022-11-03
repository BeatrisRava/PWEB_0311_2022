<!doctype html>
<html>
    <head><title> Exemplo PHP</title></head>
    <body>
        <h1>TESTE PHP</h1>
       
        <a href="pw08b.php?nome=maria&idade=25&tel=2344-2344"> Ver dados </a>
        <form method="post" action="pw08.php">
            n1: <input type="number" id="n1" name="n1"/> <br/>
            n2: <input type="number" id="n2" name="n2"/> <br/> 

            <br>
        <button name="bt1"> Calcular </button> 
        </form>

        <?php

        if(isset($_POST["bt1"])) media();

    
          function media(){
             //o codigo do php vai ser executado pelo apache
          $a = $_POST["n1"];
          $b = $_POST["n2"];
          $c = ($a + $b)/ 2;
          if($c >= 6){
            echo "<h3> Aprovado! A media = $c </h3>";
          }
          else{
            echo "<h3> Reprovado! A media = $c </h3>";
          }

          }
          ?>

          <?php include 'rodape.php';?>
          
    </body>
</html>