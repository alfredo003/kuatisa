<!DOCTYPE html>
<html lang="pt-br">
<?php $user = 0?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link rel="icon" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
</head>
<body>
<div class="ajax_load">
    <div class="ajax_load_box">
         <div class="ajax_load_box_circle"></div>
    </div>
</div>
<!--HEADER-->
<header class="main_header gradient gradient-green ">
    <div class="container">
        <div class="main_header_logo">
            <h1><a title="Home" href="<?= url(); ?>"><img class="icon transition" style="width:110px; margin-bottom:-6px"src="<?=theme("assets/images/logo.png")?>"> </a></h1>
        </div>
        <?php if($user == 1):?>
        <nav class="main_header_nav">
            <span class="main_header_nav_mobile j_menu_mobile_open icon-menu icon-notext radius transition"></span>
            <div class="main_header_nav_links j_menu_mobile_tab">
                <span class="main_header_nav_mobile_close j_menu_mobile_close icon-error icon-notext transition"></span>
                <a class="link transition radius" title="Pagina Inicial" href="<?= url(); ?>">Pagina Inicial</a>
            
                <a class="link transition radius" title="Serviços" href="<?= url("/servico"); ?>">Serviços</a>
                <a class="link transition radius" title="Técnicos" href="<?= url("/tecnico"); ?>">Técnicos / Freelancer</a>
                    <a class="link transition radius" title="Sobre" href="<?= url("/sobre"); ?>">Historico</a>
                <a class="link login transition radius icon-sign-out" title="Entrar"
                   href="<?= url("/entrar"); ?>">Sair</a>
            </div>
        </nav>
        <?php else:?>
            <nav class="main_header_nav">
            <span class="main_header_nav_mobile j_menu_mobile_open icon-menu icon-notext radius transition"></span>
            <div class="main_header_nav_links j_menu_mobile_tab">
                <span class="main_header_nav_mobile_close j_menu_mobile_close icon-error icon-notext transition"></span>
                <a class="link transition radius" title="Pagina Inicial" href="<?= url(); ?>">Pagina Inicial</a>
            
                <a class="link transition radius" title="Serviços" href="<?= url("/servico"); ?>">Serviços</a>
                <a class="link transition radius" title="Técnicos" href="<?= url("/tecnico"); ?>">Técnicos / Freelancer</a>
                    <a class="link transition radius" title="Sobre" href="<?= url("/sobre"); ?>">Sobre</a>
                <a class="link login transition radius icon-unlock-alt" title="Entrar"
                   href="<?= url("/entrar"); ?>">Entrar</a>
            </div>
        </nav>
        <?php endif;?>

    </div>
</header>

<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>


<!--FOOTER-->
<?php if($user == 1):?>
<footer class="main_footer">
    <div class="container content">
        <section class="main_footer_content">
            <article class="main_footer_content_item">
                <h2>Sobre:</h2>
                <p>O CafeControl é um gerenciador de contas simples, poderoso e gratuito. O prazer de tomar um café e
                    ter o controle total de suas contas.</p>
                <a title="Termos de uso" href="<?= url("/termos"); ?>">kuatisa &copy <?=date("Y")?></a>
            </article>

            <article class="main_footer_content_item">
                <h2>Mais:</h2>
                <a class="link transition radius" title="Pagina Inicial" href="<?= url("/"); ?>">Pagina Inicial</a>
                <a class="link transition radius" title="Serviços" href="<?= url("/servico"); ?>">Serviços</a>
                <a class="link transition radius" title="Técnicos" href="<?= url("/tecnico"); ?>">Técnicos / Freelancer</a>
                <a class="link transition radius" title="Sobre" href="<?= url("/sobre"); ?>">Sobre</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Meu Perfil:</h2>
                <p class="icon-user"><b>Nome :</b><br> Alfredo Manuel</p>
                <p class="icon-envelope"><b>Email:</b><br> info@kuatisa.com</p>
                <p class="icon-map-marker"><b>Endereço:</b><br> Namibe,Moçamedes</p>
            </article>

            <article class="main_footer_content_item social">
                <h2>Social:</h2>
                <a target="_blank" class="icon-facebook"
                   href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" title="CafeControl no Facebook">/kuatisa_page</a>
                <a target="_blank" class="icon-instagram"
                   href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" title="CafeControl no Instagram">@kuatisa_page</a>
                <a target="_blank" class="icon-youtube" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                   title="CafeControl no YouTube">/kuatisa_page</a>
            </article>
        </section>
    </div>
</footer>
<?php else:?>
    <footer class="main_footer">
    <div class="container content">
        <section class="main_footer_content">
            <article class="main_footer_content_item">
                <h2>Sobre:</h2>
                <p>O CafeControl é um gerenciador de contas simples, poderoso e gratuito. O prazer de tomar um café e
                    ter o controle total de suas contas.</p>
                <a title="Termos de uso" href="<?= url("/termos"); ?>">kuatisa &copy <?=date("Y")?></a>
            </article>

            <article class="main_footer_content_item">
                <h2>Mais:</h2>
                <a class="link transition radius" title="Pagina Inicial" href="<?= url("/"); ?>">Pagina Inicial</a>
                <a class="link transition radius" title="Serviços" href="<?= url("/servico"); ?>">Serviços</a>
                <a class="link transition radius" title="Técnicos" href="<?= url("/tecnico"); ?>">Técnicos / Freelancer</a>
                <a class="link transition radius" title="Sobre" href="<?= url("/sobre"); ?>">Sobre</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Contacto:</h2>
                <p class="icon-phone"><b>Telefone:</b><br> +244 937 180 040</p>
                <p class="icon-envelope"><b>Email:</b><br> info@kuatisa.com</p>
                <p class="icon-map-marker"><b>Endereço:</b><br> Namibe,Moçamedes</p>
            </article>

            <article class="main_footer_content_item social">
                <h2>Social:</h2>
                <a target="_blank" class="icon-facebook"
                   href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" title="CafeControl no Facebook">/kuatisa_page</a>
                <a target="_blank" class="icon-instagram"
                   href="https://www.instagram.com/<?= CONF_SOCIAL_INSTAGRAM_PAGE; ?>" title="CafeControl no Instagram">@kuatisa_page</a>
                <a target="_blank" class="icon-youtube" href="https://www.youtube.com/<?= CONF_SOCIAL_YOUTUBE_PAGE; ?>"
                   title="CafeControl no YouTube">/kuatisa_page</a>
            </article>
        </section>
    </div>
</footer>
<?php endif;?>




<script src="<?= theme("/assets/scripts.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>