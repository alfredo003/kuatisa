<?php $v->layout("_theme"); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lista dos Serviços</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">kuatisa</a></li>
              <li class="breadcrumb-item">Serviços</li>
              <li class="breadcrumb-item active" aria-current="page">Listagem</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
               
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                      <th>Foto</th>
                        <th>Title</th>
                        <th>Sub-Title</th>
                        <th>uri</th>
                        <th>Data Post</th>
                        <th>Config</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    if(!empty($servicos)):
                    foreach($servicos as $servico):?>
                      <tr>
                        <td><a href="#"><img src="<?= image($servico->cover,120)?>"></a></td>
                        <td><?=$servico->title?></td>
                        <td><?=$servico->subtitle?></td>
                        <td><span class="badge badge-success"><?=$servico->uri?></span></td>
                        <td><span class="badge badge-success"><?=$servico->post_at?></span></td>
                     
                        <td>
                           <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                            <a href="#" class="btn btn-sm btn-primary">Editar</a>
                        </td>

                      </tr>
                      <?php endforeach; endif;?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
       
            </div> </div>
            
          <!--Row-->

         
      