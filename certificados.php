<?php
include 'class/classConexao.php';
$link = OpenCon();

if ($_REQUEST['email'] != '') {
    $sql = "SELECT * FROM certificado WHERE email = '" . $_REQUEST['email'] . "'";
    $results = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($results);
    if ($row['nome'] == NULL) {
        header('Location: ./index.php?erro=email');
        die();
    }
    if ($row['funcao'] != NULL) {
        $funcao = $row['funcao'];
    }
}

$path = "include/img/certificados/";
$diretorio = dir($path);

//echo "Lista de Arquivos do diretório '<strong>" . $path . "</strong>':<br />";

?>

<?php require 'header.php' ?>

<body>
    <div class="overlay"></div>
    <div class="content container largura" style="margin:auto;">
        <img style="margin-bottom:20px;" class="mx-auto d-block" src="include/img/logo.png" alt="" height="150">
        <h1 style="text-align: center;" class="h3 mb-3 font-weight-normal">Olá <?php echo ($row['nome']) ?></h1>
        <table style="background-color:#fff; border-radius:5px;" class="table table-striped">
            <thead>
                <tr>
                    <th>Atividade</th>
                    <th style="width: 15%;">Link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($arquivo = $diretorio->read()) {

                    if (mb_strpos(utf8_encode($arquivo), $row['nome']) !== false) {
                        $url = $arquivo;
                        $arquivo = explode("-", $arquivo);
                        $arquivo = explode(".", $arquivo[1]);
                        $html = '<tr><td scope="row">' . $arquivo[0] . '</td><td style="width: 15%;"><a class="btn btn-primary btn-sm" role="button" aria-pressed="true" download href="' . $path . $url . '">Download</a></td>';
                        echo $html;
                    }
                }
                $diretorio->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="include/js/jquery-ui.js"></script>


    <script type="text/javascript">
        /* Verificar o preenchimento dos campos */
        $(function() {
            $(document).on('click', '.btn-primary', function() {
                var cpf = $('#inputCpf').val();
                var email = $('#inputEmail').val();
                if (cpf == '' && email == '') {
                    alert("Você precisa informar algum dos dados, CPF ou EMAIL!");
                    return false;
                }
            });
        });
        $(document).ready(function() {
            $("#dialog").dialog();
            $(".overlay").css("z-index","99");

            $(".ui-dialog-titlebar-close").click(function(){
                $(".overlay").css("z-index","0");
            })
        });
    </script>

</body>

</html>
<div id="dialog">
    <h3>Ficha de avaliação</h3>
    <p>Sua opinião é muito importante para nós, participe da avaliação. </p>
    <a class="btn btn-primary" href="https://forms.gle/FEFqUSZJERJ7oTnn7" target="_blank">Avaliar</a>
</div>