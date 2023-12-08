<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public Product $product;
    public Supplier $supplier;

    public function __construct() {
        $this->product = new Product();
        $this->supplier = new Supplier();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quantidadeProdutos = Product::sum('quantidade');
        $suppliers = $this->supplier->all();
        $products = $this->product->all();

        $quantidade_por_Produtos = 0;
        $valorEstoque = 0;
        $precoEstoque = 0;
        $lucro = 0;
    
        // Calcule a quantidade e o valor total do estoque
        foreach ($products as $product) {
            $quantidade_por_Produtos += $product->quantidade;
            $valorEstoque += $product->valor * $product->quantidade;
        }

        foreach ($products as $product) {
            $quantidade_por_Produtos += $product->quantidade;
            $precoEstoque += $product->preco * $product->quantidade;
        }

        $lucro = $precoEstoque - $valorEstoque;

         // obtendp o número de fornecedores cadastrados
         $numberSuppliers = $suppliers->count();

        return view('products.index', [
            'products' => $products, 
            'suppliers' => $suppliers, 
            'quantidadeProdutos' => $quantidadeProdutos, 
            'valorEstoque' => $valorEstoque, 
            'lucro' => $lucro,
            'numberSuppliers' => $numberSuppliers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Defina mensagens de erro personalizadas
    $messages = [
        'nome.required' => 'O campo nome é obrigatório.',
        'valor.required' => 'O campo valor é obrigatório.',
        'valor.numeric' => 'O campo valor deve ser um número.',
        'valor.gte' => 'O campo valor deve ser maior ou igual a :value.',
        'quantidade.required' => 'O campo quantidade é obrigatório.',
        'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
        'quantidade.gte' => 'O campo quantidade deve ser maior ou igual a :value.',
        'preco.required' => 'O campo preço é obrigatório.',
        'preco.numeric' => 'O campo preço deve ser um número.',
        'preco.gte' => 'O campo preço deve ser maior ou igual a :value.',
    ];

    // Validação com mensagens personalizadas
    $validated = $request->validate([
        'nome' => 'required',
        'valor' => 'required|numeric|gte:0',
        'quantidade' => 'required|integer|gte:0',
        'preco' => 'required|numeric|gte:0',
    ], $messages);

    try {
        // Crie um novo produto com base nos dados do formulário
        $this->product->supplier_id = $request->input('fornecedor');
        $this->product->nome = $request->input('nome');
        $this->product->descricao = $request->input('descricao');
        $this->product->valor = $request->input('valor');
        $this->product->quantidade = $request->input('quantidade');
        $this->product->preco = $request->input('preco');

        // Defina o status com base na quantidade
        $this->product->status = ($this->product->quantidade > 0);

        // Salve o produto no banco de dados
        $this->product->save();

        // Redirecione para uma página de sucesso ou faça qualquer outra ação desejada
        return redirect()->route('products.index');
    } catch (\Exception $e) {
        // Em caso de erro, redirecione de volta para o formulário de criação com os erros de validação
        return redirect()->route('products.create')->withErrors([$e->getMessage()]);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nome' => 'nullable',
            'valor' => 'nullable|numeric|gte:0',
            'quantidade' => 'nullable|integer|gte:0',
            'preco' => 'nullable|numeric|gte:0',
        ]);

        $product->fill([
            'supplier_id' => is_null($request->input('fornecedor')) ? $product->supplier_id : $request->input('fornecedor'),
            'nome' => is_null($request->input('nome')) ? $product->nome : $request->input('nome'),
            'descricao' => is_null($request->input('descricao')) ? $product->descricao : $request->input('descricao'),
            'valor' => is_null($request->input('valor')) ? $product->valor : $request->input('valor'),
            'quantidade' => is_null($request->input('quantidade')) ? $product->quantidade : $request->input('quantidade'),
            'preco' => is_null($request->input('preco')) ? $product->preco : $request->input('preco'),
        ]);

        if ($product->quantidade > 0) {
            $product->status = true;
        } else {
            $product->status = false;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
