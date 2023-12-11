<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EstoqueAki</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div id="login" class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            <div class="col-lg-6">
                                <div style="padding: 100px 50px 100px 50px">

                                    <div class="sidebar-brand d-flex align-items-center justify-content-center mb-5" href="/products">
                                        <div class="sidebar-brand-icon rotate-n-0">
                                            <svg style="color: #13293D" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
                                            </svg>
                                        </div>
                                        <h3 style="color: #13293D" class="sidebar-brand-text mx-3">EstoqueAki</h3>
                                    </div>

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form class="user" action="{{ route('users.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputName" placeholder="Sua empresa" name="name" autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Senha" name="password" autofocus>
                                        </div>
                                       
                                        <button class="btn btn-primary btn-user btn-block">Entrar</button>
                                    </form>
                                    <hr class="my-4 mb-4">
                                    <div class="">
                                        <button class="btn btn-info btn-block btn-lg" onclick="sobre_modal()"
                                        style="background-color: #2C9FAF; border: none; border-radius: 30px; font-size: 10pt; padding: 12px;">
                                        <i class="bi bi-info-circle-fill" style="font-size: 9pt;"></i> Sobre</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
                            <!-- Modal Sobre -->
                            <div class="modal fade " id="caixa_lancamento0" tabindex="-1" role="dialog"
                                aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title h1 text-center" id="TituloModalCentralizado">
                                                Sobre o EstoqueAki</h5>
                                            <button style="background-color: transparent; border:none;" type="button"
                                                class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-xxl">
                                                <div class="authentication-wrapper authentication-basic container-p-y">
                                                    <form class="" action=""
                                                        method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card-body">
                                                                    <div class="mb-3 text-justify">
                                                                        <div class="sidebar-brand-icon rotate-n-0 d-flex justify-content-center">
                                                                            <svg style="color: #13293D" xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                                                                <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
                                                                            </svg>
                                                                        </div>                                                            
                                                                        <p class="my-4">
                                                                        Após uma pesquisa realizada com empreendedores da região do Seridó, constatou-se a ausência de um sistema que pudesse aprimorar as operações desses empresários. Diante dessa lacuna identificada, o EstoqueAki toma a iniciativa de criar um sistema dedicado a atender e suprir essa demanda no âmbito do comércio local, com o objetivo de apoiar os comerciantes regionais.
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /modal adicionar-->
    </div>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/f3dad5cee4.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
    <!-- Modal -->
    <script>
    function sobre_modal() {
        let idModal = document.getElementById('caixa_lancamento0');
        let modal_lancamento = new bootstrap.Modal(idModal);
        modal_lancamento.show();
    }
    </script>

</body>

</html>