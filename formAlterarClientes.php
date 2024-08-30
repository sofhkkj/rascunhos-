<?php
    require_once("includes/conectarBD.php");
    include_once 'includes/cabecalho.php';
    echo "Data/Hora Atual: ";
    require 'includes/data.inc';
?>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Alterar Dados de Clientes</b></font></div></td>
        </tr>
    </table>
    <?php
        if (!isset($_POST["cliID"])&& !isset($_POST["enviar"]))
        {
    ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <p>Código do Cliente: <input type="text" name="cliID" size="10">
            <input type="submit" value="Alterar Dados do Cliente" name="alterar"></p>
            <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosClientes.php'> Clique Aqui </a><br/></font></div>
        </form>
        <?php
        }
        //Buscará os dados do Cliente
        else if(!isset($_POST["enviar"]))
        {
            $cliID = $_POST["cliID"];
            $consulta = mysqli_query($conexao, "SELECT cliID, cliNome, cliEmail, cliCPF,  date_format(cliDataNascimento,'%d/%m/%Y') as cliDataNascimento FROM clientes WHERE cliID = '$cliID'");
            //obtém a resposta do Select executado acima
            $linha = mysqli_num_rows($consulta);
            if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, o cliente não foi encontrado
        {
            echo "Cliente não encontrado $cliID";
            echo "<br>";
            echo "<b><a href='formAlterarClientes.php'><b>Voltar para a Alteração de Clientes</a><br/>";
        }
        else
        {
            echo "<div><font face=Arial size=4><b>Cliente Encontrado:</b></font></div>";
            //seta a linha de campoCliente da tabela clientes e depois, coloca cada campo em uma variável.
            $campoCliente = mysqli_fetch_row($consulta);            
            $cliNome = $campoCliente[1];
            $cliEmail = $campoCliente[2];
            $cliCPF = $campoCliente[3];
            $cliDtNascimento = $campoCliente[4];
        ?>
            <form name="formClientes" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
                <tr>
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
                    <td width="20%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliNome" size="42" required value="<?php echo $cliNome;?>"></font></td>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><input type="email" name="cliEmail" required value="<?php echo $cliEmail;?>"></font></td>                    
                    <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliCPF" size="10" required value="<?php echo $cliCPF;?>"></font></td>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliDtNascimento" size="10" required value="<?php echo $cliDtNascimento;?>"></font></td>
                </tr>
            </table>
            <input type ="hidden" name="cliID" value="<?php echo $cliID;?>">
            <input type ="hidden" name="enviar" value="S">
            <input type ="submit" value="Alterar Dados do Cliente" name="alterar"></p>
            </form>
            <?php
                mysqli_close($conexao);
        }
        }
        else // alterar cliente
        {
            $cliID = $_POST["cliID"];
            $cliNome = $_POST["cliNome"];
            $cliEmail = $_POST["cliEmail"];
            $cliCPF = $_POST["cliCPF"];
            $cliDtNascimento = $_POST["cliDtNascimento"];
            $altera = mysqli_query($conexao, "UPDATE clientes SET cliNome='$cliNome', cliEmail='$cliEmail', cliCPF='$cliCPF', cliDataNascimento = str_to_date('$cliDtNascimento','%d/%m/%Y') WHERE cliID='$cliID'");
            //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
            if (mysqli_affected_rows($conexao) > 0)
            {
                echo "<p align='center'>Dados do Cliente $cliNome alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
                echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center'>";
                    echo "<tr>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial'csize='2'>Código do Cliente</font></b></div></td>";
                        echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>Nome do Cliente</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>E-mail</font></b></div></td>";
                        echo "<td width='03%'><div align='center'><b><font face='Arial' size='2'>CPF</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Data Nascimento</font></b></div></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliID</font></td>";                        
                        echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$cliNome</font></td>";                        
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliEmail</font></td>";
                        echo "<td width='03%' height='25'><b><font face='Arial' size='2'>$cliCPF</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliDtNascimento</font></td>";
                    echo "</tr>";
                echo "</table>";
            }
            else
            {
                $erro=mysqli_error($conexao );
                echo "<p align='center'>Erro:$erro</p>";
            }
        mysqli_close($conexao);
    }
?>
    <div align="center" font face="Arial" size="2">
        <b><a href='formIncluirClientes.php'><b>Voltar para a Inclusão de Clientes</a><br/>
        <b><a href='formExcluirClientes.php'><b>Voltar para a Exclusão de Clientes</a><br/>
        <b><a href='menuPesquisarClientes.php'><b>Voltar para a Pesquisa de Clientes</a><br/>
        <b><a href='index.php'><b>Voltar para o menu de Opções Gerenciamento de Clientes</a><br/>
    </div>
<?php
    include_once 'includes/rodape.php';
?>
