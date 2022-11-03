<html>
    <body>
        <?php lerdados(); ?>
        <?php include 'rodape.php';?>
    </body>
</html>

<?php  
function lerdados(){
    if(isset($_GET["nome"])){
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
    $tel = $_GET["tel"];
    echo "<b>Nome</b>: $nome </br>";
    echo "<b>Idade</b>: $idade </br>";
    echo "<b>Telefone</b>: $tel </br>";
} else {
    echo "<h1> Dados Invalidos </h1>";
}

}
?>