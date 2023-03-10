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

    <link href="/css/custom.css" rel="stylesheet" type="text/css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid pe-0">
            <a class="navbar-brand fs-4" href="#"><i class="bi bi-whatsapp"></i></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">HOME</a>
                    </li>
                </ul>
            </div>

            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-3" href="/logout" style="width: 70px; text-align: center; padding-left: 20px;">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid">
            <?php require '../src/views/' . $view . '.php'; ?>
        </div>
    </main>

    <div class="container-fluid">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <!-- <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1"><img src="<?= URL_CDN; ?>/images/logo.png" style="height: 35px;" alt=""></a> -->
                <span class="text-muted">© <?= YEAR; ?> devRaiz - Desenvolvimento de Software</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted fs-4" href="#"><i class="bi bi-instagram"></i></li>
                <li class="ms-3"><a class="text-muted fs-4" href="#"><i class="bi bi-facebook"></i></a></li>
            </ul>
        </footer>
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
    <script type="text/javascript" src="<?= URL_CDN; ?>/mask/mask.min.js"></script>
    <script type="text/javascript" src="<?= URL_CDN; ?>/mask/maskMoney.js"></script>
    <script type="text/javascript" src="<?= URL_CDN; ?>/mask/Masks.js"></script>

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

    <!-- form.js utiliza a constante toastWarning  -->
    <script type="text/javascript" src="<?= URL_CDN; ?>/validate/form.js"></script>

    <script>
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