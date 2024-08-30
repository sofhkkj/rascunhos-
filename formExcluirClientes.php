<?php
    require_once("includes/conectarBD.php");
    include_once 'includes/cabecalho.php';
    echo "Data/Hora Atual: ";
    require 'includes/data.inc';
?>
      <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
          <td height="60"><div align="center"><font face="Arial" size="4"><b>Excluir Dados de Clientes</b></font></div></td>
      </tr>
      </table>      
<?php
     if (!isset($_POST["cliID"]) && !isset($_POST["enviar"]))
     {
?>
     <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
           <p>Código do Cliente: <input type="text" name="cliID" size="10">
           <input type="submit" value="Excluir Dados do Cliente" name="excluir"></p>
           <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosClientes.php'> Clique Aqui </a><br></font></div>
     </form>
<?php
     }
     //Vai buscar dados do Cliente
     else if(!isset($_POST["enviar"])) 
     {
          $cliID = $_POST["cliID"];
       $consulta = mysqli_query($conexao, "SELECT cliID, cliNome, cliEmail, cliCPF, date_format(cliDataNascimento,'%d/%m/%Y') as cliDataNascimento FROM clientes WHERE cliId = '$cliID'");          
        //obtem a resposta do Select executado acima
        $linha = mysqli_num_rows($consulta);
     if ($linha == 0) //verifica quantas linhas teve a query executada, se for igual a zero o cliente não foi encontrado
     {
          echo "Cliente não encontrado $cliID";
          echo "<br>";
          echo "<b><a href='formExcluirClientes.php'><b>Voltar para a Exclusão de Clientes</a><br/>";
     }
     else
     {
          echo "<div><font face=Arial size=4><b>Cliente Encontrado:</b></font></div>";
          //seta a linha de campoCliente da tabela clientes e depois coloca cada campo em uma variavel
          $campoCliente = mysqli_fetch_row($consulta);          
          $cliNome = $campoCliente[1];
          $cliEmail = $campoCliente[2];
          $cliCPF = $campoCliente[3];
          $cliDtNascimento = $campoCliente[4];
?>
          <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
             <tr bgcolor="#6699CC">
                 <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Clientes Cadastrados</font></b></font></div></td>
             </tr>
             <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Cliente</font></b></div></td>                 
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Nome do Cliente</font></b></div></td>                 
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">E-mail</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">CPF</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Data Nascimento</font></b></div></td>
             </tr>
             <tr>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cliID;?></font></td>                 
                 <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $cliNome;?></font></td>                 
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cliEmail;?></font></td>
                 <td width="03%" height="25"><b><font face="Arial" size="2"><?php echo $cliCPF;?></font></td>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cliDtNascimento;?></font></td>
             </tr>
          </table>
          <input type ="hidden" name="cliID" value="<?php echo $cliID;?>">
          <input type ="hidden" name="enviar" value="S">
          <input type ="submit" value="Deseja Realmente Excluir o Cliente?" name="excluir"></p>
          </form>
<?php
          mysqli_close($conexao);
     }
     }
     else
     // Excluir Cliente
     {
          $cliID = $_POST["cliID"];
          $deleta = mysqli_query($conexao, "DELETE FROM clientes WHERE cliID = '$cliID'");
          //O comando mysqli_affected_rows(), vai retornar a quantidade de linhas alteradas com o comando DELETE
          if (mysqli_affected_rows($conexao)>0)
          {
             echo "<p align='center'>Dados do Cliente foram excluídos com sucesso!!!</p>";              
          }
          else
          {
              $erro=mysqli_error($conexao);
              echo "<p align='center'>Erro:$erro</p>";
          }
              mysqli_close($conexao);
          }
?>
    <div align="center" font face="Arial" size="2">
        <b><a href='formIncluirClientes.php'><b>Voltar para a Inclusão de Clientes</a><br/>
        <b><a href='formAlterarClientes.php'><b>Voltar para a Alteração de Clientes</a><br/>
        <b><a href='menuPesquisarClientes.php'><b>Voltar para a Pesquisa de Clientes</a><br/>
        <b><a href='index.php'><b>Voltar para o menu de Opções Gerenciamento de Clientes</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>
