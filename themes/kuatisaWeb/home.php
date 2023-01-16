<?php $v->layout("_theme"); ?>

    <!--FEATURED-->
    <article class="home_featured">
        <div class="home_featured_content container content">
            <header class="home_featured_header">
                <h2>Problemas em contratar um profissional qualificado? Os seus problemas acabam agora!</h2>
                <p>Cadastre-se, lance suas contas e conte com automações poderosas para gerenciar tudo enquanto você
                    toma um
                    bom café!</p>
                <p><span data-go=".blog"
                         class="home_featured_btn gradient gradient-green gradient-hover radius transition icon-check-square-o">Solicitar um serviço / Tecnico</span></p>
                <p class="features">Rápido | Simples | Seguro</p>
            </header>
        </div>

        <div class="home_featured_app">
        <img src="<?= theme("/assets/images/home-app.jpg"); ?>" alt="CafeControl" title="CafeControl"/>
        </div>
    </article>

    <!--FEATURES-->
    <div class="home_features">
        <section class="container content">
            <header class="home_features_header">
                <h2>O que você pode fazer com o kuatisa?</h2>
                <p>São 3 paços simples para você começar a utilizar sua conta e dar visibilidade aos seus serviços. É tudo muito fácil, veja:</p>
            </header>

            <div class="home_features_content">
                <article class="radius">
                    <header>
                        <img alt="Contas a receber" title="Contas a receber"
                             src="<?= theme("/assets/images/home_receive.png"); ?>"/>
                        <h3>Encontrar Profissionais</h3>
                        <p>Encontre prestadores de serviços 100% eficiente e capazes de resolver os seus problemas em diverças ares. É seguro!</p>
                    </header>
                </article>

                <article class="radius">
                    <header>
                        <img alt="Contas a pagar" title="Contas a pagar"
                             src="<?= theme("/assets/images/home_pay.png"); ?>"/>
                        <h3>Mapeamento de Redes Sociais</h3>
                        <p>Podes ter o controle das redes sociais do seu negócio e ter
                         o acompanhamento dos clientes nas diferentes plataformas. É simples!</p>
                    </header>
                </article>

                <article class="radius">
                    <header>
                        <img alt="Controle e relatórios" title="Controle e relatórios"
                             src="<?= theme("/assets/images/home_control.PNG"); ?>"/>
                        <h3>Publicitar Negócio / Serviço</h3>
                        <p>publicar os seus serviços ou negócio como um freelancer e como uma empresa de forma mais elegante. É rapido!</p>
                    </header>
                </article>
            </div>
        </section>
    </div>

    <!--OPTIN-->
    <article class="home_optin">
        <div class="home_optin_content container content">
            <header class="home_optin_content_flex">
                <h2>Cadastre-se no kuatisa e comece a publicitar os seus serviços</h2>
                <p>Como prestador de serviço no mundo de hoje, a melhor forma e talvez a única, para 
                alcançar seus clientes em potencial é online.
                   </p>
                <p>Com o kuatisa voçe pode Mapear as suas redes sociais publicitar o seu negócio  tudo isso de forma facil  e gratuito para ajudar você nessa tarefa..</p>
                <p>Pronto para começar a utilizar ?</p>
            </header>

            <div class="home_optin_content_flex">
                <span class="icon icon-check-square-o icon-notext"></span>
                <h4>Crie sua conta gratuitamente:</h4>
                <form action="<?= url("/cadastrar"); ?>" method="post" enctype="multipart/form-data">
                    <div class="ajax_response"><?= flash(); ?></div>
                    <?= csrf_input(); ?>
                    <input type="text" name="first_name" placeholder="Primeiro nome:"/>
                    <input type="text" name="last_name" placeholder="Último nome:"/>
                    <input type="email" name="email" placeholder="Melhor e-mail:"/>
                    <input type="password" name="password" placeholder="Senha de acesso:"/>
                    <button class="radius transition gradient gradient-green gradient-hover">Criar minha conta</button>
                </form>
            </div>
        </div>
    </article>

    <!--VIDEO-->
    <article class="home_video">
        <div class="home_video_content container content">
            <header>
                <h2>Descubra tudo sobre o kuatisa.ao</h2>
                <span data-modal=".home_video_modal" class="icon-play-circle-o icon-notext transition"></span>
            </header>
        </div>

        <div class="home_video_modal j_modal_close">
            <div class="home_video_modal_box">
                <div class="embed">
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/<?= $video; ?>?rel=0&amp;showinfo=0"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </article>

    <!--BLOG-->
<?php if (empty($services)): ?>
    <div class="content content">
        <div class="empty_content">
            <img class="empty_content_cover" title="Empty Content" alt="Empty Content"
                 src="<?= theme("/assets/images/empty-content.jpg"); ?>"/>
            <h3 class="empty_content_title">Estamos trabalhando aqui</h3>
            <p class="empty_content_desc">Em breve você terá acesso aos nossos serviços, e resolver o seu problema
                :)</p>
        </div>
    </div>
<?php else: ?>
    <section class="blog">
        <div class="blog_content container content">
            <header class="blog_header">
                <h2>Nossos Serviços</h2>
                <p>Confira serviços e profissionais que podem resolver os seus problemas</p>
            </header>

            <div class="blog_articles">
                <?php foreach ($services as $post): ?>
                    <?php $v->insert("service-list", ["post" => $post]); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>