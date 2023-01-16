<?php $v->layout("_theme"); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Configuração</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">kuatisa</a></li>
              <li class="breadcrumb-item">Configuração</li>
            </ol>
          </div>

          <div class="row">
           

            <div class="col-lg-12">
              <!-- General Element -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="card-body">
                  <form action="<?= url("/app/profile"); ?>" method="post">
                  <input type="hidden" name="update" value="true"/>

                      <div class="app_formbox_photo">
                          <div class="rounded j_profile_image thumb" style="background-image: url('<?= $photo; ?>')"></div>
                          <div><input data-image=".j_profile_image" type="file" class="radius"  name="photo"/></div>
                      </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Nome</label>
                      <input type="text" class="form-control"  name="first_name" value="<?= $user->first_name; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">SobreNome</label>
                      <input type="text" class="form-control"  name="last_name" value="<?= $user->last_name; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Data Nascimetnto</label>
                      <input type="date" class="form-control"  name="last_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Email</label>
                      <input class="form-control" type="text" placeholder="......."  name="email" value="<?= $user->email; ?>">
                    </div>
                    <div class="form-group">
                      <label for="validationServer01">Palavra-passe</label>
                      <input type="password" class="form-control"  name="password">
                    </div>
                    <div class="form-group">
                      <label for="validationServer01">Confirmar Palavra-passe</label>
                      <input type="password" class="form-control"  name="password_re">
                    </div>
                    <div class="alert alert-secondary" role="alert">
                   Contactos Para os Serviços</div>
                   <div class="form-group">
                      <label for="validationServer01">Nº Telefone</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="telefone">
                    </div>
                    <div class="form-group">
                      <label for="validationServer01">Email(comercial)</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" name="emalaCome">
                    </div>
                    <div class="form-group">
                      <label for="validationServer01">Redes Social (Separado por ' - ')</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="redes">
                    </div>

                    <div class="form-group">
                      <button class="form-control btn btn-primary">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            
            </div>
          </div>
    
          <!--Row-->
