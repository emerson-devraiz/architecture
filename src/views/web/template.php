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
    <link href="<?= URL_CDN; ?>/materialize/icons/icons.css" rel="stylesheet" type="text/css">

</head>

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

<body class="grey lighten-4">
    
    <header>
        <div class="navbar-fixed">
            <nav class="nav-extended teal">
                <div class="nav-wrapper">
                    <ul class="hide-on-med-and-down">
                        <li><a href="/home" class="light">HOME</a></li>
                    </ul>

                    <ul class="right" >
                        <li><a href="/logout"><i class="material-icons">logout</i></a></li>
                    </ul>

                    <ul class="right hide-on-med-and-down">
                        <li><a href="/home/home" class="light"><i class="material-icons left">account_circle</i>MINHA CONTA</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <?php require_once '../../src/views/web/' . $view . '.php'; ?>

</body>

</html>

<script type="text/javascript" src="<?= URL_CDN; ?>/jQuery/jquery.js"></script>
<script type="text/javascript" src="<?= URL_CDN; ?>/materialize/js/materialize.min.js"></script>

<script type="text/javascript" src="<?= URL_CDN; ?>/validate/materialize/form.js"></script>

<script>
    $(document).ready(function() {

        // Inicializa os campos select
        $('select').material_select();

        // Inicializa os modais
        $('.modal').modal();

    });

    function excluir() {

        return confirm('Deseja realmente excluir este registro?');
    }

    function encodeUtf8(s) {

        return unescape(encodeURIComponent(s));

    }

    function decodeUtf8(s) {

        return decodeURIComponent(escape(s));

    }

    function digitosIguais(str) {

        let iguais = true;

        for (let i = 0; i < str.length - 1; i++) {

            if (str.charAt(i) != str.charAt(i + 1)) {

                iguais = false;
                break;

            }

        }

        //console.log(iguais);

        return iguais;
    }

    function marcarTodos(cpCheckbox, qtd) {
        for (let i = 1; i <= qtd; i++) {
            document.getElementById(cpCheckbox + i).checked = true;
        }
    }

    function desmarcarTodos(cpCheckbox, qtd) {
        for (let i = 1; i <= qtd; i++) {
            document.getElementById(cpCheckbox + i).checked = false;
        }
    }
</script>

<?php if (isset($data['message'])) : ?>
    <script>
        Materialize.toast('<?= $data['message']; ?>', 4000, 'rounded red');
    </script>
<?php endif; ?>