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
            <li class="nav-item active">
                <a class="nav-link" href="/products">
                    <i class="fas fa-fw fa-solid fa-box"></i>
                    <span>Produtos</span></a>
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
                    <i class="fas fa-fw fa-solid fa-right-to-bracket fa-flip-horizontal"></i>
                    <span>Saída</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gerar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/reports">
                    <i class="fas fa-fw fa-solid fa-clipboard"></i>
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
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Produtos</h1>
                    </div>
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Produtos em Estoque
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $quantidadeProdutos }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-box-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Número de fornecedores
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $numberSuppliers }}
                                            </div>
                                            <!-- observar função a ser utilizada na linha Anterior -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-truck-fast fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Valor em estoque</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                R$ {{ $valorEstoque }}
                                            </div>
                                            <!-- observar função a ser utilizada na linha Anterior -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-brazilian-real-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Estimativa de lucro</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                R$ {{ $lucro }}
                                            </div>
                                            <!-- observar função a ser utilizada na linha Anterior -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-chart-line fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->

                        <!-- Pending Requests Card Example -->
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mt-5 mb-4">
                        <div class="card-header py-2" style="background-color: #13293D;">
                            <h3 style="color: white;">Tabela de Produtos</h1>
                        </div>
                        <div class="card-header py-3">
                            <!--botaão para acionar o modal adicionar-->
                            <!-- <button type="submit" class="btn float-end btn-primary" style="margin-right:1rem;"
                                data-toggle="modal" data-target="#ExemploModalCentralizado" onclick="mostrar_modal()"> +
                                Adicionar
                                Produto
                            </button> -->

                            <button type="submit" class="btn float-end btn-primary" style="margin-right:1rem;" data-toggle="modal" data-target="#caixa_lancamento"> +
                             Adicionar Produto
                            </button>


                            <!-- Modal Adicionar-->
                            <div class="modal fade " id="caixa_lancamento" tabindex="-1" role="dialog"
                                aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title h1 text-center text-primary" id="TituloModalCentralizado">
                                                Adicionar Produto</h5>
                                            <button style="background-color: transparent; border:none;" type="button"
                                                class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-xxl">
                                                <div class="authentication-wrapper authentication-basic container-p-y">
                                                    <form class="" action="{{ route('products.store') }}" method="POST" id="formsCadastrar">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card-body">
                                                                    
                                                            <!-- Se houver erros, exiba dentro do modal -->
                                                            @if($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif

                                                            <!-- Se houver mensagem de erro na sessão, exiba dentro do modal -->
                                                            @if(session('error'))
                                                                <div class="alert alert-danger">
                                                                    {{ session('error') }}
                                                                </div>
                                                            @endif

                                                            <!-- Restante do conteúdo do seu modal -->

                                                                    <div class="mb-3">
                                                                        <label class="col-form-label"
                                                                            for="basic-default-company">Nome</label>
                                                                        <input type="text" class="form-control"
                                                                            id="basic-default-company"
                                                                            placeholder="Nome" name="nome" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="col-form-label"
                                                                            for="basic-default-company">Descrição</label>
                                                                        <input type="text" class="form-control"
                                                                            id="basic-default-company"
                                                                            placeholder="Descrição" name="descricao"
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">     
                                                                        <label class="col-form-label"
                                                                            for="basic-default-company">Quantidade</label>
                                                                        <input type="number" class="form-control"
                                                                            id="basic-default-company"
                                                                            placeholder="Quantidade" name="quantidade"
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <div class="d-inline-block">
                                                                            <label class="col-form-label"
                                                                                for="basic-default-company">Valor de compra (R$)</label>
                                                                            <input type="text" class="form-control money-mask"
                                                                                id="basic-default-company"
                                                                                placeholder="Valor de compra" name="valor"
                                                                                required>

                                                                        </div>
                                                                        <div class="d-inline-block">
                                                                            <label class="col-form-label"
                                                                                for="basic-default-company">Preço de venda (R$)</label>
                                                                            <input type="text" class="form-control money-mask"
                                                                                id="basic-default-company"
                                                                                placeholder="Preço de venda" name="preco"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="col-form-label"
                                                                            for="basic-default-company">Fornecedor</label>
                                                                        <select type="text" class="form-control"
                                                                            id="basic-default-company"
                                                                            placeholder="Fornecedor" name="fornecedor"
                                                                            required>
                                                                            @if(count($suppliers) == 0)
                                                                            <option value="" disabled selected hidden>Não há fornecedor cadastrado</option>
                                                                            @else
                                                                            <option value="" disabled selected hidden>Selecione um fornecedor</option>
                                                                            @foreach ($suppliers as $supplier)
                                                                            <option value="{{ $supplier->id }}">
                                                                                {{ $supplier->nome }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Salvar</button>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- Precisa adicionar descrição, fornecedor e status na tabela. -->
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Quantidade</th>
                                            <th>Valor de compra</th>
                                            <th>Preço de venda</th>
                                            <th>Fornecedor</th>
                                            <th>Status</th>
                                            <th class="" width="10%">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->nome }}</td>
                                            <td>{{ $product->descricao }}</td>
                                            <td>{{ $product->quantidade }}</td>
                                            <td>R$ {{ number_format(floatval($product->valor), 2, '.', ' ') }}</td>
                                            <td>R$ {{ number_format(floatval($product->preco), 2, '.', ' ') }}</td>
                                            <td>
                                                @if(isset($product->supplier->nome))
                                                {{ $product->supplier->nome}}
                                                @else Fornecedor excluído
                                                @endif</td>
                                            <!-- <td>{{ $product->fornecedor }}</td>-->
                                            <td>
                                                @if ($product->status)
                                                Disponível
                                                @else
                                                Em Falta
                                                @endif
                                            </td>
                                            <!-- <td>{{ $product->status }}</td> -->

                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!--botão para acionar o modal mostrar-->
                                                    <button type="submit" class="btn btn-info btn-icon-split mx-2"
                                                        style="margin-right:1rem;" data-toggle="modal"
                                                        data-target="#caixa_lancamento2{{ $product->id }}"
                                                        title="Mostrar" onclick="mostrar_modal2()">
                                                        <span class="icon text-white-50"><i
                                                                class="fas fa-eye"></i></span>
                                                    </button>

                                                    <!-- Modal Mostrar -->
                                                    <div class="modal fade text-center" 
                                                        id="caixa_lancamento2{{ $product->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="TituloModalCentralizado"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title h1 text-center text-primary"
                                                                        id="TituloModalCentralizado">
                                                                        Produto</h5>
                                                                    <button
                                                                        style="background-color: transparent; border:none;"
                                                                        type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i class="fa-solid fa-xmark" title="Fechar"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body p-3">
                                                                    <div class="container-xxl p-3 d-flex justify-content-center">
                                                                        <div class="authentication-wrapper authentication-basic container-p-y">
                                                                                <table class="table table-responsive table-bordered" style="width: 105%;">
                                                                                    <thead class="bg-primary text-white">
                                                                                        <th scope="col">Nome</th>
                                                                                        <th scope="col">Descrição</th>
                                                                                        <th scope="col">Quantidade</th>
                                                                                        <th scope="col">Valor de compra</th>
                                                                                        <th scope="col">Preço de venda</th>
                                                                                        <th scope="col">Fornecedor</th>
                                                                                        <th scope="col">Status</th>
                                                                                    </thead>
                                                                                    <tbody class="">
                                                                                        <tr class="">
                                                                                            <td scope="row">{{ $product->nome }}</td>

                                                                                            <td scope="row">{{ $product->descricao }}</td>
                                                                                            
                                                                                            <td scope="row">{{ $product->quantidade }}</td>

                                                                                            <td scope="row">R$ {{ number_format(floatval($product->valor), 2, '.', ' ') }}</td>
 
                                                                                            <td scope="row">R$ {{ number_format(floatval($product->preco), 2, '.', ' ') }}</td>
                                                                                              
                                                                                            <td>
                                                                                                @if(isset($product->supplier->nome))
                                                                                                {{
                                                                                                $product->supplier->nome}}
                                                                                                @else Fornecedor
                                                                                                excluído
                                                                                                @endif
                                                                                            </td>
                                                                                            <!-- <td scope="row">{{ $product->fornecedor }}</td>-->
                                                                                            <td scope="row">
                                                                                                @if ($product->status)
                                                                                                Disponível
                                                                                                @else
                                                                                                Em Falta
                                                                                                @endif
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /modal mostrar-->

                                                    <!--botão para acionar o modal editar-->
                                                    <button type="submit" class="btn btn-warning btn-icon-split mx-2"
                                                        style="margin-right:1rem;" data-toggle="modal"
                                                        data-target="#caixa_lancamento3{{ $product->id }}"
                                                        title="Editar" onclick="editar_modal()">
                                                        <span class="icon text-white-50"><i
                                                                class="fas fa-pencil"></i></span>
                                                    </button>

                                                    <!-- Modal Editar-->
                                                    <div class="modal fade " id="caixa_lancamento3{{ $product->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title h1 text-center text-primary"
                                                                        id="TituloModalCentralizado">
                                                                        Editar Produto</h5>
                                                                    <button
                                                                        style="background-color: transparent; border:none;"
                                                                        type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i class="fa-solid fa-xmark"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-xxl">
                                                                        <div
                                                                            class="authentication-wrapper authentication-basic container-p-y">
                                                                            <form class=""
                                                                                action="{{ route('products.update', ['product' => $product->id]) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="_method"
                                                                                    value="PUT">
                                                                                <div class="row">
                                                                                    <div class="col-xl">
                                                                                        <div class="card-body">
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="basic-default-company">Nome</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="basic-default-company"
                                                                                                    value="{{$product->nome}}"
                                                                                                    name="nome">
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="basic-default-company">Descrição</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="basic-default-company"
                                                                                                    value="{{$product->descricao}}"
                                                                                                    name="descricao">
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="basic-default-company">Quantidade</label>
                                                                                                <input type="number"
                                                                                                    class="form-control"
                                                                                                    id="basic-default-company"
                                                                                                    value="{{$product->quantidade}}"
                                                                                                    name="quantidade">
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <div
                                                                                                    class="d-inline-block">
                                                                                                    <label
                                                                                                        class="col-form-label"
                                                                                                        for="basic-default-company">Valor de compra (R$)</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control money-mask"
                                                                                                        id="basic-default-company"
                                                                                                        value="{{$product->valor}}"
                                                                                                        name="valor">

                                                                                                </div>
                                                                                                <div
                                                                                                    class="d-inline-block">
                                                                                                    <label
                                                                                                        class="col-form-label"
                                                                                                        for="basic-default-company">Preço de venda (R$)</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control money-mask"
                                                                                                        id="basic-default-company"
                                                                                                        value="{{$product->preco}}"
                                                                                                        name="preco">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label
                                                                                                    class="col-form-label"
                                                                                                    for="basic-default-company">Fornecedor</label>
                                                                                                <select type="text"
                                                                                                    class="form-control"
                                                                                                    id="basic-default-company"
                                                                                                    placeholder="{{$product->fornecedor}}"
                                                                                                    name="fornecedor">
                                                                                                    @foreach ($suppliers
                                                                                                    as $supplier)
                                                                                                    @if(isset($product->supplier->id)){
                                                                                                        <option
                                                                                                        value="{{ $supplier->id }}"
                                                                                                        {{ $product->
                                                                                                        supplier->id ===
                                                                                                        $supplier->id ?
                                                                                                        'selected' : ''
                                                                                                        }}>
                                                                                                        {{
                                                                                                        $supplier->nome
                                                                                                        }}</option>
                                                                                                    } @else{<option value="{{ $supplier->id }}">
                                                                                                        {{ $supplier->nome }}</option>}
                                                                                                    @endif
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col text-center">
                                                                                        <button type="submit"
                                                                                            class="btn btn-warning">Salvar alterações</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /modal editar -->

                                                    <!--botaão para acionar o modal excluir-->
                                                    <button type="submit" class="btn float-end btn-danger mx-2"
                                                        style="margin-right:1rem;" data-toggle="modal"
                                                        data-target="#caixa_lancamento4{{ $product->id }}"
                                                        onclick="excluir_modal()">
                                                        <span class="icon text-white-50"><i
                                                                class="fas fa-trash"></i></span>
                                                    </button>

                                                    <!-- Modal Excluir-->
                                                    <div class="modal fade" id="caixa_lancamento4{{ $product->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-primary" id="exampleModalLabel">
                                                                        Excluir
                                                                        Produto</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Tem certeza que deseja excluir esse Produto
                                                                        ({{$product->nome}})?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancelar
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Excluir</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
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

    <!-- Inputmask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <!-- Modal script -->
    <script>
        
        // function mostrar_modal() {
        //     let idModal = document.getElementById('caixa_lancamento');
        //     let modal_lancamento = new bootstrap.Modal(idModal);
        //     modal_lancamento.show();
        // }

        function mostrar_modal() {
        let idModal = document.getElementById('caixa_lancamento');
        let modal_lancamento = new bootstrap.Modal(idModal);
        modal_lancamento.show();
    }

    // Adicione este bloco de script para lidar com o envio do formulário
    document.getElementById('formsCadastrar').addEventListener('submit', function (event) {
        // Permita que o formulário seja enviado
        // (não há necessidade de evitar a submissão padrão se não houver erros)
    });

    // Verifique os erros de validação do formulário após a conclusão da submissão
    let hasErrors = {!! json_encode($errors->any()) !!};
    if (hasErrors) {
        // Se houver erros de validação, abra o modal para exibir os erros
        mostrar_modal();
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

        $(document).ready(function() {
            $('.money-mask').inputmask('currency', {
                prefix: '',
                allowMinus: false,
                thousandsSeparator: '.',
                rightAlign: false,
                autoUnmask: true,
            });
        });
    </script>

</body>

</html>