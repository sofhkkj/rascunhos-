<?php
    require_once("includes/conectarBD.php");
    include_once 'includes/cabecalho.php';
    echo "Data/Hora Atual: ";
    require 'includes/data.inc';
?>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Clientes</b></font></div></td>
        </tr>
    </table><br/>
    <?php
        //Recebe os dados digitados no formulário de cadastro de clientes via método POST        
        $nomeCli = $_POST["cliNome"];
        $emailCli = $_POST["cliEmail"];
        $cpfCli = $_POST["cliCPF"];
        $dtNascimentoCli = new DateTime($_POST["cliDataNascimento"]);
        $dataFormatada = $dtNascimentoCli->format('d/m/Y');
        //O comando SQL que gravará os dados dos clientes na tabela clientes. Observem que estamos utilizando o comando str_to_date no campo $dtNascimentoCli para que o usuário possa digitar a data no formato dd/mm/aaaa
        $sql = mysqli_query($conexao,"INSERT INTO clientes (cliNome, cliEmail, cliCPF, cliDataNascimento) VALUES ('$nomeCli', '$emailCli', '$cpfCli', str_to_date('$dataFormatada','%d/%m/%Y'))") or die("Erro no comando SQL!!!<br/> <b><a href='formIncluirClientes.php'><b>Voltar Para a Inclusão de Clientes</a><br/>".mysqli_error($conexao));
        echo "<div align=center>Os dados do Cliente $nomeCli foram cadastrados com sucesso!!! Veja abaixo os dados cadastrados.<br/><br/>";
        echo "<table>";
        echo "<tr>";
        echo "<th><div>Nome do Cliente</div></th>";
        echo "<th><div>E-mail</div></th>";
        echo "<th><div>CPF</div></th>";
        echo "<th><div>Data Nascimento</div></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$nomeCli</font></td>";
        echo "<td>$emailCli</font></td>";
        echo "<td>$cpfCli</font></td>";
        echo "<td>$dataFormatada</font></td>";
        echo "</tr>";
        echo "</table><br/>";
        echo "<div align='center' font face='Arial' size='2'>";
            echo "<b><a href='formIncluirClientes.php'><b>Voltar para a Inclusão de Clientes</a><br/>";
            echo "<b><a href='formAlterarClientes.php'><b>Voltar para a Alteração de Clientes</a><br/>";
            echo "<b><a href='formExcluirClientes.php'><b>Voltar para a Exclusão de Clientes</a><br/>";
            echo "<b><a href='menuPesquisarClientes.php'><b>Voltar para a Pesquisa de Clientes</a><br/>";
            echo "<b><a href='index.php'><b>Voltar para o menu de Opções Gerenciamento de Clientes</a><br/>";
        echo "</div>";
    ?>
<?php
    include_once 'includes/rodape.php';
?>
