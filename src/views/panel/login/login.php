<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <title><?= APP_NAME; ?></title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Cache-Control" content="no-cache, no-store">
    <meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
    <meta name="robots" content="index, follow">
    <meta name="Category" content="business">
    <meta name="title" content="<?= APP_NAME; ?>">
    <meta name="url" content="<?= URL_BASE; ?>">
    <meta name="geo.region" content="BR-PR">
    <meta name="geo.placename" content="Assis">
    <meta name="autor" content="Emerson Silveira">
    <meta name="company" content="Grupo devRaiz">
    <meta name="revisit-after" content="10">

    <link href="<?= URL_CDN; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= URL_CDN; ?>/bootstrap/icons/font/bootstrap-icons.css" rel="stylesheet" type="text/css">

    <style>
        body {
            min-height: 100vh;
        }
    </style>

    <link href="/css/custom.css" rel="stylesheet" type="text/css">

</head>

<body class="d-flex align-items-center">

    <div class="container-fluid d-flex justify-content-center">
        <div class="card" style="width: 25rem;">
            <div class="card-header text-center">
                <h2>Login</h2>
            </div>
            <form id="formLogin" action="/login/auth" method="post" autocomplete="off">
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control email" id="email" name="email" obrigatorio="true" nome-validar="E-mail" placeholder="Digite seu E-mail" value="emerson@devraiz.com.br">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-group">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password" obrigatorio="true" nome-validar="Senha" placeholder="Digite sua senha" value="devraiz">
                            <label for="password">Senha</label>
                        </div>
                        <span id="password-addon" class="input-group-text" style="cursor: pointer;" onclick="passwordAddon(this)"><i class="bi bi-eye"></i></span>
                    </div>
                    <div class="mt-3 text-end">
                        <button id="btnAcessar" name="btnAcessar" type="submit" class="btn btn-primary">ACESSAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="div-toast-danger" class="toast" role="alert" data-bs-delay="3000" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger">
                <strong class="me-auto">Erro!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="toast-msg" class="toast-body"></div>
        </div>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="div-toast-success" class="toast" role="alert" data-bs-delay="3000" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto">Sucesso!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="toast-msg" class="toast-body"></div>
        </div>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="div-toast-warning" class="toast" role="alert" data-bs-delay="3000" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-warning">
                <strong class="me-auto">Aviso!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="toast-msg" class="toast-body"></div>
        </div>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="div-toast-info" class="toast" role="alert" data-bs-delay="3000" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info">
                <strong class="me-auto">Info!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="toast-msg" class="toast-body"></div>
        </div>
    </div>

    <script type="text/javascript" src="<?= URL_CDN; ?>/jQuery/jquery.js"></script>
    <script type="text/javascript" src="<?= URL_CDN; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        const divToastDanger = document.getElementById('div-toast-danger');
        const divToastSuccess = document.getElementById('div-toast-success');
        const divToastWarning = document.getElementById('div-toast-warning');
        const divToastInfo = document.getElementById('div-toast-info');

        const toastDanger = new bootstrap.Toast(divToastDanger);
        const toastSuccess = new bootstrap.Toast(divToastSuccess);
        const toastWarning = new bootstrap.Toast(divToastWarning);
        const toastInfo = new bootstrap.Toast(divToastInfo);
    </script>

    <script>
        var submited = false;
    </script>

    <!-- form.js utiliza a constante toastWarning  -->
    <script type="text/javascript" src="<?= URL_CDN; ?>/validate/form.js"></script>


    <script>
        function passwordAddon(input) {
            let e = document.getElementById("password");

            if (e.type === "password") {
                e.type = "text";
                input.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                e.type = "password";
                input.innerHTML = '<i class="bi bi-eye"></i>';
            }
        }

        <?php if (isset($data['toast-danger'])) : ?>

            $('#div-toast-danger #toast-msg').html('<?= $data['toast-danger']; ?>');
            toastDanger.show();

        <?php endif; ?>

        <?php if (isset($data['toast-success'])) :  ?>

            $('#div-toast-success #toast-msg').html('<?= $data['toast-success']; ?>');
            toastSuccess.show();

        <?php endif; ?>

        <?php if (isset($data['toast-warning'])) :  ?>

            $('#div-toast-warning #toast-msg').html('<?= $data['toast-warning']; ?>');
            toastWarning.show();

        <?php endif; ?>

        <?php if (isset($data['toast-info'])) :  ?>

            $('#div-toast-info #toast-msg').html('<?= $data['toast-info']; ?>');
            toastInfo.show();

        <?php endif; ?>
    </script>



</body>

</html>