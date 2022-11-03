<!doctype html>
<html>
    <head></head>
    <body>
    <h1>Cliente</h1>
    <a href="listacliente.php">voltar para lista</a>
    <form method="post" action="cliente.php">
    codigo:
    <input type="number" id="codigo" name="codigo" /><br/>
    nome:
    <input type="text" id="nome" name="nome" /><br/> 
    email:
    <input type="email" id="email" name="email" /><br/> 
    senha:
    <input type="password" id="senha" name="senha" /><br/> 
    cep :
    <input type="text" id="cep" name="cep" /><br/> 
    logradauro:
    <input type="text" id="logradouro" name="logradouro" /><br/> 
    cidade :
    <input type="text" id="cidade" name="cidade" /><br/> 
    telefone:
    <input type="text" id="telefone" name="telefone" /><br/> 
    <button name="b1">Inserir</button>    
    <button name="b2">pesquisar</button>    
    <button name="b3">alterar</button>    
    <button name="b4">remover</button>    
</form>
    <?php
    if(isset($_POST["b1"])) inserir();
    if(isset($_POST["b2"])) pesquisar($_POST["codigo"]);
    if(isset($_POST["b3"])) alterar();
    if(isset($_POST["b4"])) remover();
    ?>
    </body>
</html>    
<?php
function inserir(){
    $nome   =   $_POST["nome"];
    $email  =   $_POST["email"];
    $senha  =   $_POST["senha"];
    $telefone   =   $_POST["telefone"];
    $cep    =   $_POST["cep"];
    $cidade =   $_POST["cidade"];
    $logradouro =   $_POST["logradouro"];
    $conexao = new mysqli("localhost","root","123456",
        "pwebt");
    $sql = "insert into cliente(nome, email, senha,
     telefone, cep, cidade, logradouro) values(
        '$nome', '$email', md5('$senha'), '$telefone',
        '$cep', '$cidade', '$logradouro')";
    mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    echo "<h4>Registro inserido com sucesso!</h4>";        
}

 

function pesquisar($codigo){
    $conexao = new mysqli("localhost","root","123456",
    "pwebt"); 
  $sql = "select * from cliente where codigo=$codigo";
  $ret = mysqli_query($conexao, $sql);
  if($reg = mysqli_fetch_array($ret)){
    $nome   =   $reg["nome"];
    $email  =   $reg["email"];
    $senha  =   $reg["senha"];
    $telefone  =   $reg["telefone"];
    $cep    =   $reg["cep"];
    $cidade =   $reg["cidade"];
    $logradouro =   $reg["logradouro"];
    echo "<script lang='javascript'>";
    echo "nome.value='$nome';";
    echo "email.value='$email';";
    echo "codigo.value='$codigo';";
    echo "cidade.value='$cidade';";
    echo "cep.value='$cep';";
    echo "telefone.value='$telefone';";
    echo "logradouro.value='$logradouro';";
    echo "</script>";
  } else {
    echo "<h4>Registro não existe!</h4>";  
  }  
  mysqli_close($conexao);
}
function alterar(){
    $codigo   =   $_POST["codigo"];
    $nome   =   $_POST["nome"];
    $email  =   $_POST["email"];
    $senha  =   $_POST["senha"];
    $telefone   =   $_POST["telefone"];
    $cep    =   $_POST["cep"];
    $cidade =   $_POST["cidade"];
    $logradouro =   $_POST["logradouro"];
    $conexao = new mysqli("localhost","root","123456",
        "pwebt");
    $sql = "update cliente set nome='$nome', 
    email='$email', senha= md5('$senha'),
     telefone='$telefone', cep='$cep', 
     cidade='$cidade', logradouro='$logradouro' 
     where codigo=$codigo";
    mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    echo "<h4>Registro alterado com sucesso!</h4>";        
}
function remover(){
    $codigo   =   $_POST["codigo"];    
    $conexao = new mysqli("localhost","root","123456",
        "pwebt");
    $sql = "delete from cliente where codigo=$codigo";
    mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    echo "<h4>Registro removido com sucesso!</h4>";        
}
?>