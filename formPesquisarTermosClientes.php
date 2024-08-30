<?php
    require_once("includes/conectarBD.php");
    include_once 'includes/cabecalho.php';
    echo "Data/Hora Atual: ";
    require 'includes/data.inc';
?>
<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar por Código, Nome e E-mail de Clientes</b></font></div></td>
    </tr>
</table>      
    <form method="POST" action="resultadoPesquisarTermosClientes.php">
        <p><div align="left"><font face="Arial" size="2">
        <b>Selecione Código, Nome ou E-mail do Cliente:<br>
        <select name="cliItemPesquisa">
            <option value="cliID"><b>Código</option>    
            <option value="cliNome"><b>Nome</option>
            <option value="cliEmail"><b>E-mail</option>
            </select><br/><br/>
        <b>Digite um Termo Conforme Item Escolhido Acima:</br>
        <input name="cliTermoPesquisa" type="text" size="40"></br>
        <input type="submit" value="Pesquisar"></font></div><br>               
    </form>
    <div align="center" font face="Arial" size="2">
        <b><a href='menuPesquisarClientes.php'><b>Voltar Para o Menu Pesquisar Clientes</a><br>
        <b><a href='index.php'>Voltar Para o Menu de Opções Gerenciamento de Clientes</a><br>
    </div>
<?php
    include_once 'includes/rodape.php';
?>
