<?php $v->layout("_theme"); ?>

<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Kuatisa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pagina Incial</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
               <a href="<?=url('/app/listagem-servicos')?>" style="text-decoration:none;"> 
               <div class="card h-100">
            
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Serviços</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0<?= $service?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>  -----</span>
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
                
              </div></a>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
               <a href="<?=url('/app/agenda')?>" style="text-decoration:none;"> 
               <div class="card h-100">
            
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Clientes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0<?=$cliente?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>  -----</span>
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
                
              </div></a>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?=url('/app/listagem-servicos')?>" style="text-decoration:none;"> 
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Configuração</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">--</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> --</span>
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cog fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Historico</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">--</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> ---</span>
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

         
            <div class="col-xl-12 col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Solicitações</h6>
                  <a class="m-0 float-right btn btn-danger btn-sm" href="<?=url('/app/agenda')?>">Ver Mais <i
                      class="fas fa-chevron-right"></i></a>
                </div>
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
                    <?php if(!empty($request)):?>
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
                      <?php endif;?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          
          </div>
          <!--Row-->

         

        
        </div>