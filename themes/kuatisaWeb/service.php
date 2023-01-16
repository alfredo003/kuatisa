<?php $v->layout("_theme"); ?>

<section class="blog_page">
    <header class="blog_page_header">
        <h1 style="color:#fff;"><?= ($title ?? "NOSSOS SERVIÇOS"); ?></h1>
        <p style="color:#fff;"><?= ($search ?? "Problemas em contratar um profissional qualificado? Os seus problemas acabam agora! Encontre aqui a solução dos seus problemas"); ?></p>
        <form name="search" action="<?= url("/servicos/buscar"); ?>" method="post" enctype="multipart/form-data">
            <label style="width:400px;background:#fff;">
                <input type="text" name="s" placeholder="Pesquisar..."  required/>
                <button class="icon-search icon-notext" style="background:transparent;"></button>
            </label>
        </form>
    </header> 

    <?php if (empty($services) && !empty($search)): ?>
        <div class="content content">
            <div class="empty_content">
                <h3 class="empty_content_title">Sua pesquisa não retornou resultados </h3>
                <p class="empty_content_desc">Você pesquisou por <b><?= $search; ?></b>. Tente outros termos.</p>
                <a class="empty_content_btn gradient gradient-green gradient-hover radius"
                   href="<?= url("/servicos"); ?>" title="Blog">...ou volte aos Serviços</a>
            </div>
        </div>
    <?php elseif (empty($services)): ?>
        <div class="content content">
            <div class="empty_content">
                <h3 class="empty_content_title">Ainda estamos trabalhando aqui!</h3>
                <p class="empty_content_desc">Nossos editores estão preparando um conteúdo de primeira para você.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="blog_content container content">
            <div class="blog_articles">
                <?php foreach ($services as $post): ?>
                    <?php $v->insert("service-list", ["post" => $post]); ?>
                <?php endforeach; ?>
            </div>

            <?= $paginator; ?>
        </div>
    <?php endif; ?>
</section>