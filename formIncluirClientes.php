<?php
    include_once 'includes/cabecalho.php';
    echo "Data/Hora Atual: ";
    require 'includes/data.inc';
?>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Clientes</b></font></div></td>
        </tr>
    </table>    
    <form name="formClientes" id="formClientes" method="POST" action="incluirClientes.php">
    <table width="35%" border="0" cellspacing="0" cellpadding="0"
        <tr>
            <td width="24%" height="25">Nome:</td>
            <td height="25" width="76%"><input type="text" name="cliNome" required></td>
        </tr>
        <tr>
            <td height="25" width="24%">Email:</td>
            <td height="25" width="76%"><input type="email" name="cliEmail" required></td>
        </tr>
        <tr>
            <td height="25" width="24%">CPF:</td>
            <td height="25" width="76%"><input type="text" name="cliCPF" required></td>
        </tr>
        <tr>
            <td height="25" width="24%">Data Nascimento:</td>
            <td height="25" width="76%"><input type="date" name="cliDataNascimento" required></td>
        </tr>    
    <tr>
    <td height="25" colspan="2">
        <div>
                <input type="submit" name="cadCliente" value="Cadastrar Cliente">
        </div></td>
    </tr>
    </table>
    </form>
</body>
    <div align="center" font face="Arial" size="2">
        <a href='index.php'>Voltar para o menu de Opções Gerenciamento de Clientes</a><br/>
    </div>
<?php
    include_once 'includes/rodape.php';
?>
