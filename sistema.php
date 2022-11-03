<?php
    session_start(); 
    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
    } else {
        header('Location: index.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Medico</title>
        
        <!--Select2-->
         <link href="libs/select2/dist/css/select2.css" rel="stylesheet"/>

        <!--Datepicker-->
        <link rel="stylesheet" href="libs/DatePicker/css/jquery-ui.min.css">

        <!--Iconos-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        <!--DataTable-->
        <link rel="stylesheet" type="text/css" href="libs/datatable/datatables.css">

        <!--Estilo Maqueta-->
        <link href="css/maqueta.css" rel="stylesheet" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="sistema.php"><i class="fa fa-stethoscope"></i> Sistema Medico</a>
          
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
            <span id="user"> <?= $usuario ?></span>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" id="settings">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" id="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
       
        <div id="layoutSidenav">
           
            <div id="layoutSidenav_nav">
              
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="margin-left: 15px;">
                
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Persons</div>

                            <!-- Nav Item - Paciente Collapse Menu -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePacientes" aria-expanded="false" aria-controls="collapsePacientes">
                             <i class="bi bi-person-fill" style="padding-right: 8px;"></i>
                              <span> Pacientes</span>
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                          
                            <div class="collapse" id="collapsePacientes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" id="listadopac">Listado</a>
                                    <a class="nav-link" id="agregarpac">Agregar</a>
                                </nav>
                            </div>
                            
                            <!-- Nav Item - Medicos Collapse Menu -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMedicos" aria-expanded="false" aria-controls="collapseMedicos">
                                <i class="bi bi-person-fill" style="padding-right: 8px;"></i>
                                <span>Medicos</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                           
                            <div class="collapse" id="collapseMedicos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" id="listadomed">Listado</a>
                                    <a class="nav-link" id="agregarmed">Agregar</a>
                                </nav>
                            </div>


                            <div class="sb-sidenav-menu-heading">Functions</div>
                            
                            <!-- Nav Item - Atencion Ambulatoria -->
                            <a class="nav-link" id="atencion_ambulatoria">
                                <i class="bi bi-stack" style="padding-right: 8px;"></i>
                                <span>Atencion Ambulatoria</span>
                            </a>
                            
                            <!-- Nav Item - Consultas -->
                            <a class="nav-link" id="consultas">
                                <i class="bi bi-folder" style="padding-right: 8px;"></i>
                                <span>Consultas</span></a>
                            </a>
                        
                        </div>
                    </div>
                


                </nav>
            </div>
           
          
            
            <div id="layoutSidenav_content">
              
                <main>
                    <div class="container-fluid" id="contenedor1">

                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                        <div class="justify-content-between small" style="text-align: center;">
                            <div class="text-muted">Sistema Medico &copy; Julian Muñoz</div>
                        </div>
              </footer>
            </div>
        </div>
        
        <!-- Modal Logout -->

        <div class="modal"  id="cerrar_sesion" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                    <h5>Desea cerrar sesión?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="button" id="salir" class="btn btn-success">Logout</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
              </div>
                  
            </div>
          </div>
        </div>


        <!-- Archivo JQuery -->
        <script type="text/javascript" src="libs/jQuery/jquery-3.6.0.js"></script>       
        <script type="text/javascript" src="js/menu.js?v=1"></script>
        <script type="text/javascript" src="js/login.js?v=1"></script>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <!-- DataTable -->

        <script type="text/javascript" charset="utf8" src="libs/datatable/datatables.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

       <!-- Select 2 -->
        <script src="libs/select2/dist/js/select2.min.js"></script>

        <!-- Date Picker -->
        <script type="text/javascript" src="libs/DatePicker/js/jquery-ui.js"></script>


    </body>
</html>
