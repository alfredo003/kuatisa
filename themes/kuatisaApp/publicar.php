<?php $v->layout("_theme"); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Postar seus Serviços</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">kuatisa</a></li>
              <li class="breadcrumb-item">Serviços</li>
              <li class="breadcrumb-item active" aria-current="page">Publicar</li>
            </ol>
          </div>

          <div class="row">
       
            <div class="col-lg-12">
              <!-- General Element -->
              <div class="card mb-4"> 
               
                <div class="card-body">
                  <form action="<?= url("/app/publicar"); ?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?= flash(); ?></div>
            <?= csrf_input(); ?>
 
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Titulo</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="........" name="title">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Sub-Titulo</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="........" name="subtitle">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Categoria do Serviço</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <?php foreach($categorias as $categoria):?>
                      <option value="<?= $categoria->id?>"><?= $categoria->title?></option>
                      <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Imagem</label>
                      <input type="file" class="form-control" name="cover">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Conteudo Sobre o serviço</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                      <button class="form-control btn btn-primary">Publicar</button>
                    </div>
                    
                  </form>
                </div>
              </div>
         
            </div>
          </div>
          <!--Row-->
