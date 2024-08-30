<?php
    include_once 'includes/cabecalho.php';    
?>
    <table width="55%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td>
                <table width="130%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="130%"><font color="#3300FF"><b>Gerenciamento de Clientes</font> - <font color="#3300FF"><b>Data do Sistema:</font> <?php include_once 'includes/data.inc'; ?> </td>
                    </tr>
                    <tr>
                    
                    </tr>
                </table>
            </td>
        </tr>
            <tr>
                <td nowrap>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <ol type="I" start="1"><br/>
                                <li><a href="formIncluirClientes.php"><font color="#3300FF"><b>Incluir</font></a>
                                <li><a href="formAlterarClientes.php"><font color="#3300FF"><b>Alterar</font></a>
                                <li><a href="formExcluirClientes.php"><font color="#3300FF"><b>Excluir</font></a>
                                <li><a href="menuPesquisarClientes.php"><font color="#3300FF"><b>Pesquisar</font></a>
                            </ol>
                        </tr>
                    </table>
                </td>
            </tr>
    </table>
<?php
    include_once 'includes/rodape.php';
?>
