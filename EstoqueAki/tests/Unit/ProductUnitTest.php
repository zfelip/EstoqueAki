<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use Database\Factories\ProductFactory;

class ProductUnitTest extends TestCase {

    use RefreshDatabase;

    /*Testes relacionados a criação de produtos ======
    * ================================================
    ==================================================*/

    // Teste de criar produto com o campus de nome vazio e ter o erro certo
    public function test_Create_Product_Name_Invalide() {
        $response = $this->post('/products', [
            'nome' => '',
            'valor' => 10.99,
            'quantidade' => 10,
            'preco' => 19.99,
        ]);
        //codigo 500 e dados corrompidos inviados pro servidor
        //302 e dado invalido na sessao
        $response->assertStatus(302);

        $response->assertSessionHasErrors('nome'); //Verifca erro de validação de um campo
    }

    // Teste de criar produto com o campus de valor invalido e retornando o erro certo
    public function test_Create_Product_valor_Invalide_envio_de_tipo_errado() {
        $response = $this->post('/products', [
            'nome' => 'Teste de produto',
            'valor' => 'Valor invalido', //deveria ser número
            'quantidade' => 10,
            'preco' => 19.99,
        ]);
        //codigo 500 e dados corrompidos inviados pro servidor
        //302 e dado invalido na sessao
        $response->assertStatus(302);

        $response->assertSessionHasErrors('valor');
    }

    // Teste de criar produto com o campus de quantidade invalido de numero negativo
    public function test_Create_Product_quantidade_Invalide_numero_negativo() {
        $response = $this->post('/products', [
            'nome' => 'Teste de produto',
            'valor' => 8.50, 
            'quantidade' => -12, //quantidade negativa
            'preco' => 19.99,
        ]);
        //Serve para os outros atributos
        $response->assertStatus(302);

        $response->assertSessionHasErrors('quantidade');
    }

    /*Testes relacionados a estocagem ================
    * ================================================
    ==================================================*/

    // Teste para verificar a quantidade em estoque
    public function test_Quant_Product_in_Stock() {
        $product1 = ProductFactory::new()->create(['quantidade' => 10]);
        $product2 = ProductFactory::new()->create(['quantidade' => 4]);
        $product3 = ProductFactory::new()->create(['quantidade' => 6]);

        $QuantTotal = 
        $product1->quantidade + 
        $product2->quantidade +
        $product3->quantidade;

        $this->assertEquals(20, $QuantTotal);
    }

    // Teste para verificar o valor em estoque
    public function test_Value_in_Stock() {
        $product1 = ProductFactory::new()->create(['quantidade' => 10, 'valor' => 4]);
        $product2 = ProductFactory::new()->create(['quantidade' => 4, 'valor' => 5]);
        $product3 = ProductFactory::new()->create(['quantidade' => 6, 'valor' => 6]);
    
        $ValorTotal = (
        ($product1->quantidade * $product1->valor) + 
        ($product2->quantidade * $product2->valor) +
        ($product3->quantidade * $product3->valor));
    
        $this->assertEquals(96, $ValorTotal);
    }

    // Teste para Estimativa de Lucro
    public function test_Profit_Estimate() {
        $product1 = ProductFactory::new()->create(['quantidade' => 10, 'valor' => 4, 'preco' => 16]);
        $product2 = ProductFactory::new()->create(['quantidade' => 4, 'valor' => 5, 'preco' => 15]);
        $product3 = ProductFactory::new()->create(['quantidade' => 6, 'valor' => 6, 'preco' => 26]);

        $ValorTotal = (
        ($product1->quantidade * $product1->valor) + 
        ($product2->quantidade * $product2->valor) +
        ($product3->quantidade * $product3->valor));
        
        $PrecoTotal = (
        ($product1->quantidade * $product1->preco) + 
        ($product2->quantidade * $product2->preco) +
        ($product3->quantidade * $product3->preco));

        $EstimativaLucro = $PrecoTotal - $ValorTotal;
        
        $this->assertEquals(280, $EstimativaLucro);
    }
}
