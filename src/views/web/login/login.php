<!DOCTYPE html>
<html lang="pt-br">

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

    <link href="<?= URL_CDN; ?>/materialize/css/materialize.min.css" rel="stylesheet" type="text/css">

</head>

<style>
    body {

        display: flex;
        min-height: 100vh;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    main {

        flex: 1 0 auto;
    }

    @media only screen and (min-width: 993px) {
        .full-width {
            width: 35%;
        }
    }

    @media only screen and (min-width: 600px) and (max-width: 992px) {
        .full-width {
            width: 50%;
        }
    }

    @media only screen and (max-width: 600px) {
        .full-width {
            width: 90%;
        }
    }

    .collection-item {
        padding: 10px 10px !important;
        border-bottom: 0px !important;
    }

    input {
        margin-bottom: 0px !important;
    }

    .spinner-white-only {
        border-color: #ffffff;
    }

    .preloader-wrapper.small-1 {
        width: 20px;
        height: 20px;
        margin-top: 10px;
    }
</style>

<body class="grey lighten-4 valign-wrapper">
    <form id="frmLogin" name="frmLogin" action="/login/auth" method="POST" class="full-width" autocomplete="off">
        <ul class="collection with-header">
            <li class="collection-header">
                <h5 class="center teal-text">Login</h5>
            </li>
            <li class="collection-item">
                <div class="input-field">
                    <input id="whatsapp" name="whatsapp" class="only-numbers celullar" type="text" maxlength="50" obrigatorio="true" nome-validar="Whatsapp" value="18999999999">
                    <label for="whatsapp">Whatsapp</label>
                </div>
            </li>
            <li class="collection-item">
                <div class="input-field">
                    <input id="password" name="password" type="password" maxlength="50" obrigatorio="true" nome-validar="Senha" value="devraiz">
                    <label for="password">Senha</label>
                </div>
            </li>
            <li class="collection-item" style="text-align: right;">
                <button class="btn waves-effect waves-light" preloader="true" type="submit" id="btnAcessar" name="btnAcessar" style="width: 150px;">
                    <span>acessar</span>
                    <div class="preloader-wrapper small-1 active hide">
                        <div class="spinner-layer spinner-white-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                </button>
            </li>
        </ul>
    </form>
</body>

</html>

<script type="text/javascript" src="<?= URL_CDN; ?>/jQuery/jquery.js"></script>
<script type="text/javascript" src="<?= URL_CDN; ?>/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="<?= URL_CDN; ?>/mask/mask.min.js"></script>
<script type="text/javascript" src="<?= URL_CDN; ?>/mask/maskMoney.js"></script>
<script type="text/javascript" src="<?= URL_CDN; ?>/mask/Masks.js"></script>

<script type="text/javascript" src="<?= URL_CDN; ?>/validate/materialize/form.js"></script>

<?php if (isset($data['message'])) : ?>
    <script>
        Materialize.toast('<?= $data['message']; ?>', 4000, 'rounded red');
    </script>
<?php endif; ?>