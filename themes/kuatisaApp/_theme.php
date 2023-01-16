<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?= theme("/assets/img/favicon.png", CONF_VIEW_APP); ?>"/>
  <?= $head; ?>
  <link href="<?= theme("assets/vendor/fontawesome-free/css/all.min.css", CONF_VIEW_APP); ?>" rel="stylesheet" type="text/css">
  <link href="<?= theme("assets/vendor/bootstrap/css/bootstrap.min.css", CONF_VIEW_APP); ?>" rel="stylesheet" type="text/css">
  <link href="<?= theme("assets/css/ruang-admin.min.css", CONF_VIEW_APP); ?>" rel="stylesheet">
  <link href="<?= theme("assets/css/style.css", CONF_VIEW_APP); ?>" rel="stylesheet">
  <link href="<?= theme("assets/css/message.css", CONF_VIEW_APP); ?>" rel="stylesheet">
  <link href="<?= theme("assets/style.css", CONF_VIEW_APP); ?>" rel="stylesheet">
</head>

<body id="page-top">

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Carregando...</p>
    </div>
</div>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      
        <div class="sidebar-brand-text mx-3"> <img src="<?= theme("/assets/img/logo.png", CONF_VIEW_APP); ?>" style="width:200px;"></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= url("/app"); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Pagina Inicial</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu Principal
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Serviços</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seus Serviços</h6>
            <a class="collapse-item" href="<?=url('/app/listagem-servicos')?>">Listagem</a>
            <a class="collapse-item" href="<?=url('/app/publicar')?>">Publicar</a>
     </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seus Clientes</h6>
            <a class="collapse-item" href="<?=url('/app/agenda')?>">Agenda de cliente</a>
            <a class="collapse-item" href="form_advanceds.html">Historico</a>
          </div>
        </div>
      </li>
     
     
      <hr class="sidebar-divider">
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=url("/app/perfil")?>">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Configurações</span>
        </a>
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= url("/app/sair"); ?>">
          <i class="fas fa-fw fa-sign-out-alt "></i>
          <span>Sair</span>
        </a>
      </li>
      <hr class="sidebar-divider">
     
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Pesquisar..."
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">1</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                 Centro de Notificações
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Mais Notificações...</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">1</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                 Centro de Mensagem
                </h6>
               
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-default"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Bem Vindo Ao kuatisa.</div>
                    <div class="small text-gray-500">kuatisa@ajuda.com</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Mais Mensagem...</a>
              </div>
            </li>
           
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" alt="<?= user()->first_name; ?>" title="<?= user()->first_name; ?>"
                             src="<?= image(user()->photo, 260, 260); ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"> <?= user()->first_name; ?> <?= user()->last_name; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=url("/app/perfil")?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Meu Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                 Configurações
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>
          </ul>
        </nav>
      <!-- Topbar -->
     
        <!-- Container Fluid-->
      <?= $v->section("content")?>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> -  Kuatisa / 
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Serviços e profissionais</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>
  <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ola! <?= user()->first_name; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Tem a certesa que desejas terminar a conta?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                  <a href="<?= url("/app/sair"); ?>" class="btn btn-danger">Terminar</a>
                </div>
              </div>
            </div>
          </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
  <script src="<?= theme("/assets/vendor/jquery/jquery.min.js", CONF_VIEW_APP); ?>"></script>
  <script src="<?= theme("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js", CONF_VIEW_APP); ?>"></script>
  <script src="<?= theme("/assets/vendor/jquery-easing/jquery.easing.min.js", CONF_VIEW_APP); ?>"></script>
  <script src="<?= theme("/assets/js/ruang-admin.min.js", CONF_VIEW_APP); ?>"></script>
  <script src="<?= theme("/assets/vendor/chart.js/Chart.min.js", CONF_VIEW_APP); ?>"></script>
  <script src="<?= theme("/assets/js/demo/chart-area-demo.js", CONF_VIEW_APP); ?>"></script>  
  <script src="<?= theme("/assets/scripts.js", CONF_VIEW_APP); ?>"></script> 
 <script src="<?= theme("/assets/js/teste.js", CONF_VIEW_APP); ?>"></script> 
</body>

</html>