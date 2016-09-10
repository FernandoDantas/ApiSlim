<?php
    @$acao = $_GET["acao"];
    @$id   = $_GET["id"];
        
    
    if($acao){
        $ch = curl_init(BUSCARID.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $resultado = json_decode(curl_exec($ch));  
        
        foreach ($resultado as $compromisso){
            $txt_titulo = $compromisso->titulo;
            $txt_descricao = $compromisso->descricao;
            $txt_data = $compromisso->data;
            $txt_hora = $compromisso->hora;
            
        }
    }
?>		
<h1>CADASTRO DE COMPROMISSO</h1>
<div class="cx-form">
    <div class="cx-pd">		

        <form action="op_meta.php" method="post">

            <label>
                <strong>Título</strong>
                <input type="text" name="txt_titulo" id="txt_titulo" value="<?= @$txt_titulo ?>" size="109"/>
            </label>
            <label>
                <strong>Descrição</strong>
                <textarea  name="txt_descricao" id="txt_descricao" rows="10" cols="70"><?= @$txt_descricao ?></textarea>
            </label>

            <label class="esq">
                <strong>Data</strong>
                <input type="text" name="txt_data" id="txt_data" value="<?= @$txt_data ?>" size="109"/>
            </label>
            <label class="esq meio">
                <strong>hora</strong>
                <input type="text" name="txt_hora" id="txt_hora" value="<?= @$txt_hora ?>" size="109"/>
            </label>




            <label>
                <div  class="cx-but">

                    <input type="hidden" name ="id" value="<?= @$id ?>">							
                    <input type="hidden" name ="acao" value="<?php if (@$acao != "") {
                        echo $acao;
                    } else {
                        echo "Cadastrar";
                    } ?>">										
                    <input type="submit" name= "logar" id="logar" value = "<?php if (@$acao != "") {
                        echo $acao;
                    } else {
                        echo "Cadastrar";
                    } ?>" class="but" >

                </div>				
            </label>
        </form>

    </div>
</div>