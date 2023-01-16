<?php $v->layout("_theme"); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Minha Agenda de Cliente</h1>
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
                  
                        <th>Serviço</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>Analise</th> 
                           <th>Data Solicit...</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($request as $solicit):?>
                      <tr>
                        <td><a href="#"><?=$solicit->service()->title?></a></td>
                        <td><?=$solicit->name_client?></td>
                        <td><?=$solicit->email?></td>
                        <td><span class="badge badge-success"><?=$solicit->sms?></span></td>
                        <td><?=$solicit->about_service?></td>
                     
                        
                        <td><?=$solicit->created_at?></td>
                        

                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
       
            </div> </div>
            
          <!--Row-->

         
      