<?php
    $ch = curl_init(LISTA); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($ch);
    
    $resultado = json_decode($json);
    curl_close($ch);
    
    if($resultado){
        
?>
<h1>Lista de Compromisso</h1>
<div class="base-lista">
    <h2><a href="index.php?link=3" class="butcat">Cadastrar Compromisso </a></h2>

    <p class="limpar">&nbsp;</p>		

    <table width="100%" border="0" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>

                <th align="center" class="tdbc">Título</th>
                <th align="left" class="tdbc">Descrição</th>
                <th align="center" class="tdbc">Data</th>
                <th align="center" class="tdbc">Hora</th>
                <th align="center" colspan="2" class="tdbc" width="10%">Ação</th>
            </tr>

            <?php
                foreach ($resultado->result as $compromisso=>$c){                       
            ?>

            <tr> 														
                <td class="coluna2"><?= $c->titulo?></td>			
                <td class="coluna2"><?= $c->descricao?></td>
                <td class="coluna2" align="center"><?= $c->data?></td>
                <td class="coluna2" align="center"><?= $c->hora?></td>
                <td class="coluna2" align="center"><a href="index.php?link=3&acao=Editar&id=<?= $c->id?>" class="editar" title="Editar"></a></td>
                <td class="coluna2" align="center"><a href="index.php?link=3&acao=Excluir&id=<?= $c->id?>" class="excluir" title="Excluir"></a></td>						

            </tr>
                    <?php } ?>            
        </tbody>
    </table>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>

</div>
</div>
<?php } ?>