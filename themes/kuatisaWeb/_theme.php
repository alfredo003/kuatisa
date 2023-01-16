<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
        <meta name="mit" content="2019-09-04T04:07:27-03:00+28440">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<!--HEADER-->
<header class="main_header gradient gradient-green">
    <div class="container">
        <div class="main_header_logo">
            <h1><a class="transition" title="Home" href="<?= url(); ?>">
             <img alt="logo kuatisa" title="logo kuatisa" src="<?= theme("/assets/images/logo.png");?>" style="width:150px;">
            </a></h1>
        </div>

        <nav class="main_header_nav">
            <span class="main_header_nav_mobile j_menu_mobile_open icon-menu icon-notext radius transition"></span>
            <div class="main_header_nav_links j_menu_mobile_tab">
                <span class="main_header_nav_mobile_close j_menu_mobile_close icon-error icon-notext transition"></span>
                <a class="link transition radius" title="Pagina Inicial" href="<?= url(); ?>">Pagina Inicial</a>
                <a class="link transition radius" title="Serviços" href="<?= url("/servicos"); ?>">Serviços</a>
                <a class="link transition radius" title="Sobre Nós" href="<?= url("/sobre"); ?>">Sobre Nós</a>
                <?php if(\Source\Models\Auth::user()):?>
                    <a class="link login transition radius icon-user" title="Entrar"
                   href="<?= url("/app"); ?>">Controlar</a>
                <?php else:?>
                    <a class="link login transition radius icon-user" title="Entrar"
                   href="<?= url("/entrar"); ?>">Entrar</a>
                    <?php endif;?>
             
            </div>
        </nav>
    </div>
</header>

<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>


<!--FOOTER-->
<footer class="main_footer">
    <div class="container content">
        <section class="main_footer_content">
            <article class="main_footer_content_item">
                <h2>Sobre:</h2>
                <p>O kuatisa é uma ferramenta que ajuda a expandir o prestador de serviços a e reduzir a sobrecarga de esforço da população</p>
                <a title="Termos de uso" href="#">Politicas do utilizador</a>
            </article>

            <article class="main_footer_content_item">
                <h2>links:</h2>
                <a class="link transition radius" title="Pagina Inicial" href="<?= url(); ?>">Pagina Inicial</a>
                <a class="link transition radius" title="Serviços" href="<?= url("/service"); ?>">Serviços</a>
                <a class="link transition radius" title="Sobre Nós" href="<?= url("/sobre"); ?>">Sobre Nós</a>

                <?php if(\Source\Models\Auth::user()):?>
                    <a class="link transition radius" title="entar" href="<?= url("/entrar"); ?>">Controlar</a>
                <?php else:?>
                    <a class="link transition radius" title="entar" href="<?= url("/entrar"); ?>">Entar</a>
                <?php endif;?>
               
            </article>

            <article class="main_footer_content_item">
                <h2>Contacto:</h2>
                <p class="icon-phone"><b>Telefone:</b><br> +244 <?= CONF_NUMBER_PHONE; ?></p>
                <p class="icon-envelope"><b>Email:</b><br> <?= CONF_EMAIL_SITE; ?> </p>
                <p class="icon-map-marker"><b>Endereço:</b><br> <?= CONF_ADDR_SITE; ?> </p>
            </article>

            <article class="main_footer_content_item social">
                <h2>Rede Social:</h2>
                <a target="_blank" class="icon-facebook"
                   href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" title="CafeControl no Facebook">/kuatisa_page</a>
                <a target="_blank" class="icon-instagram"
                   href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" title="CafeControl no Instagram">@kuatisa.ao</a>
                <a target="_blank" class="icon-youtube" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                   title="CafeControl no YouTube">/kuatisa_page</a>
            </article>
        </section>
    </div>
</footer>

<script src="<?= theme("/assets/scripts.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>