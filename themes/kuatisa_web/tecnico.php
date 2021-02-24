<?php $v->layout("_theme"); ?>

<section class="blog_page">
    <header class="blog_page_header" >
        <h1><?= ($title ?? "TECNICOS / FREELANCER");?></h1>
        <p><?=($search ?? "Encontre a solição dos seus problemas com a kuatisa")?></p>
        <form name="search" action="<?= url("/servico/buscar"); ?>" method="post" enctype="multipart/form-data">
            <label>
                <input type="text" name="s" placeholder="Pesquisar sua solução..." required/>
                <button class="icon-search icon-notext"></button>
            </label>
        </form>
    </header>

<?php if(empty($services) && !empty($search)) :?>
  <!--EMPTY CONTENT-->
  <div class="content content">
        <div class="empty_content">
             <h3 class="empty_content_title"> Sua pesquisa não retornou resultados :/</h3>
            <p class="empty_content_desc">Você pesquisou por <b><?=$search;?></b>.Tente outros termos</p>
            <a href="<?= url("/servico"); ?>" title="Blog"
               class="empty_content_btn gradient gradient-green gradient-hover radius">Voltar <i class="icon-warning"></i></a>
        </div>
    </div>
<?php elseif(empty($services)):?>

    <div class="content content">
        <div class="empty_content">
             <h3 class="empty_content_title"> Nenhum serviço publicado :/</h3>
            <p class="empty_content_desc">Caso essa mensagem permaneça, porfavor entre em contacto para a resolução do problema</p>
           
        </div>
    </div>
<?php else:?>
    <div class="blog_content container content">
        <div class="blog_articles">
        <?php foreach($services as $service): ?>
                <?php $v->insert("service-list",["service"=>$service]); ?>
            <?php endforeach; ?>
        </div>

        <?= $paginator; ?>
    </div>

<?php endif;?>

  
   
</section>
