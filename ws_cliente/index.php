<?php
require_once("includes/config.php");
require_once("includes/biblio.php");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agenda</title>

        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/estilo.css" rel="stylesheet" type="text/css">

        <!--[if lte IE 8]>
        <script type="text/javascript">
        var htmlshim='abbr,article,aside,audio,canvas,details,figcaption,figure,footer,header,mark,meter,nav,output,progress,section,summary,time,video'.split(',');
        var htmlshimtotal=htmlshim.length;
        for(var i=0;i<htmlshimtotal;i++) document.createElement(htmlshim[i]);
        </script>
        <![endif]-->
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/abas.js"></script>
    </head>


    <body>
        <!-- topo -->
        <div class="base-topo">
            <div class="conteudo">
                <section>
                    <a href="index.php?link=1" class="logo"><img src="imagens/sua-logo.png"></a>

                </section>

            </div>
        </div>
        <div class="limpar"></div>


        <!-- meio -->
        <div class="conteudo">
            <!--------------menu esquerdo---------------------->	
<?php include"menu.php" ?>

            <!--------------fecha menu esquerdo---------------------->

            <div class="base-direita">
<?php
@$link = $_GET["link"];
$pag[1] = "home.php";
$pag[2] = "lst-meta.php";
$pag[3] = "cadastro.php";

if (!empty($link)) {
    if (file_exists($pag[$link]))
        include $pag[$link];
    else
        include "home.php";
} else
    include "home.php";
?>
            </div>
        </div>

        <!-- rodape -->

        <div class="limpar"></div>
        <div class="base-rodape">
            <div class="cx-menu-rodape">
                <p>Copyright 2016 

            </div>
        </div>
    </body>
</html>
