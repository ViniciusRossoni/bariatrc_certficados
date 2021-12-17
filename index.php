<?php require 'header.php' ?>

<body class="text-center">
    <div class="overlay"></div>
    <div class="content">
        <form class="form-signin" action="certificados.php">
            <img class="mb-4" src="include/img/logo.png" height="150">
            <h1 class="h3 mb-3 font-weight-normal">Informe seu <strong>e-mail</strong> para gerar seu certificado</h1>
            <label for="inputEmail" class="sr-only">E-mail</label>
            <input name="email" style="margin-bottom:20px;" type="email" id="inputEmail" class="form-control" placeholder="E-mail">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Gerar Certificado</button>
        </form>
    </div>

</body>

</html>