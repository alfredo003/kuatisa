
<article class="blog_article">
    <a title="<?= $service->title;?>" href="<?= url("/servico/{$service->uri}"); ?>">
        <img title="<?= $service->title;?>" alt="<?= $service->title;?>" src="<?= image($service->cover,600,340)?>"/>
    </a>
    <header>
        <p class="meta"><?= $service->category()->title;?>
        &bull;Por <?= "{$service->author()->first_name} {$service->author()->last_name}"?> 
        &bull;<?= date_fmt($service->post_at);?>
        </p>
        <h2><a title="<?= $service->title;?>" href="<?= url("/servico/titulo-post"); ?>"><?= $service->title;?></a></h2>
        <p><a title="<?= $service->title;?>" href="<?= url("/servico/titulo-post"); ?>"><?= str_limit_chars($service->subtitle,120)?></a></p>
    </header>
</article>