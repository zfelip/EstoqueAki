<!DOCTYPE html>
<html lang="en">

<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1, shrink-to-fit=no"> <meta name="description" content="">

    <meta name="author" content="">
    <title>EstoqueAki</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"> <!-- Custom
    fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/products">
                <div class="sidebar-brand-icon rotate-n-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z" />
                    </svg>
                </div>
                <div class="sidebar-brand-text mx-3">EstoqueAki</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/products">
                    <i class="fas fa-fw fa-solid fa-box"></i>
                    <span>Produtos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                GERENCIAR
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/inputs">
                    <i class="fas fa-fw fa-solid fa-right-to-bracket"></i>
                    <span>Entrada</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/outputs">
                    <i class="fas fa-fw fa-solid fa-right-from-bracket"></i>
                    <span>Saída</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/suppliers">
                    <i class="fas fa-fw fa-solid fa-truck"></i>
                    <span>Fornecedor</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gerar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="/reports">
                    <i class="fas fa-fw fa-solid fa-clipboard-list"></i>
                    <span>Relatórios</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sistema
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" style="cursor: pointer;">
                <a class="nav-link" data-toggle="modal" data-target="#caixa_lancamento5" onclick="logout_modal()">
                <i class="fa-solid fa-power-off"></i>
                    <span>Sair</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
                        <h1 class="h3 mb-0 text-gray-800">Relatório de Produto</h1>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: #F8F9FC; padding: 2px;">
                            <li class="breadcrumb-item"><a href="/reports">Relatórios</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Relatório de Produto</li>
                        </ol>
                    </nav>

                    <!-- Inputs para o relatório -->
                    <form action="/reportProduct/{?}" method="GET">
                        @csrf
                        <div class="form-row mb-3 d-flex">

                            <div class="col-5 mb-2" style="margin-right: 1rem;">
                            <label class="col-form-label" for="basic-default-company">Selecionar produto</label>
                                <select type="text" class="form-control" id="basic-default-company"
                                    placeholder="Selecionar produto" name="produto" required>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex align-items-end mb-2">
                                <button class="pt-2 pb-2 rounded" style="background-color: #13293D; color: white;
                                    padding-left: 30px; padding-right: 30px; border:none; font-weight: bold;">
                                    <i class="bi bi-table"></i> Relatório
                                </button>
                            </div>
                        </div>
                    </form>

                    @if(isset($selectedProduct))
                        <div class="d-flex justify-content-end mb-4">
                            <div class="d-flex flex-column">
                                <span>Gerar</span>
                                <div style="" class="p-1">
                                    <a href="{{ route('excelProduct', ['produto' => $selectedProduct->id, 'type' => 'xlsx']) }}" class="pt-2 pb-2 rounded" style="background-color: #148248; color: white; padding-left: 30px; padding-right: 30px; border:none; font-weight: bold;">
                                        <i class="bi bi-file-earmark-excel-fill"></i> Excel
                                    </a>
                                    <a href="{{ route('pdfProduct', ['produto' => $selectedProduct->id, 'type' => 'pdf']) }}" class="pt-2 pb-2 rounded" style="background-color: #B30B00; color: white; padding-left: 30px; padding-right: 30px; border:none; font-weight: bold;">
                                    <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    <!-- Fim dos inputs para o relatório -->


                    <div class="card shadow mb-4">
                    @if(isset($selectedProduct))
                        <div class="card-header py-2" style="background-color: #13293D;">
                            <h3 style="color: white;">Entrada(s) do produto: <strong> {{ $selectedProduct->nome }} </strong></h1>
                        </div>
                    <!-- DataTales Example -->
                    @endif

                        <div class="card-body"> 
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Entrada(s)</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Entrada(s)</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @if(isset($entries))
                                        @foreach($entries as $entries)
                                        <tr>
                                        <td>{{ \Carbon\Carbon::parse($entries->updated_at)->format('d/m/Y \à\s H:i:s') }}</td>
                                            <td>{{ $entries->quantidade }}</td>                        
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
             
                <!-- tabela de saidas de produtos -->
                <div class="card shadow mb-4">
                @if(isset($selectedProduct))
                    <div class="card-header py-2" style="background-color: #13293D;">
                        <h3 style="color: white;">Saída(s) do produto: <strong> {{ $selectedProduct->nome }} </strong></h1>
                    </div>
                @endif
                    <!-- DataTales Example -->
                   
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Saída(s)</th>
                                            <th>Quantidade</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Saída(s)</th>
                                            <th>Quantidade</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @if(isset($outputs))
                                        @foreach($outputs as $output)
                                        <tr>
                                        <td>{{ \Carbon\Carbon::parse($output->updated_at)->format('d/m/Y \à\s H:i:s') }}</td>
                                            <td>{{ $output->quantidade}}</td>   
                                            <td>{{ $output->tipo}}</td>                      
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; EstoqueAki 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="caixa_lancamento5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" caso deseje encerrar sua sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="/">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/f3dad5cee4.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <!-- Modal script -->
    <script>
        function mostrar_modal() {
            let idModal = document.getElementById('caixa_lancamento');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal_lancamento.show();
        }
        function mostrar_modal2() {
            let idModal = document.getElementById('caixa_lancamento2');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal_lancamento.show();
        }
        function editar_modal() {
            let idModal = document.getElementById('caixa_lancamento3');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal_lancamento.show();
        }
        function excluir_modal() {
            let idModal = document.getElementById('caixa_lancamento4');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal_lancamento.show();
        }
        function logout_modal() {
            let idModal = document.getElementById('caixa_lancamento5');
            let modal_lancamento = new bootstrap.Modal(idModal);
            modal.lancamento.show();
        }

    </script>

</body>

</html>