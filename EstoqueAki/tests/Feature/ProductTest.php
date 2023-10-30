<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use Database\Factories\ProductFactory;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    /*Testes Iniciais ================================
    * ================================================
    ==================================================*/

    // Teste para verificar se o Model existe
    public function test_if_Model_Product_Exists() {
        $product = ProductFactory::new()->create([]);
        $this->assertModelExists($product);
    }

    // Teste para verificar quantidade de colunas
    public function test_check_if_Product_columns_is_correct() {
        $product = new Product;

        $expected = [
            'nome',
            'valor',
            'quantidade',
            'preco',
        ];
        
        $comparedarray = array_diff($expected, $product->getFillable());

        $this->assertEquals(0, count($comparedarray));
    }
    
    // Teste de acesso a pagina produtos
    public function test_access_page_products(): void {
         $response = $this->get('/products');
         $response->assertStatus(200);
    }

    // Teste de acesso pagina de edição de um produto específico
    public function testCosultProduct() {
        $product = ProductFactory::new()->create(['id' => 1]);
        
        $response = $this->get('/products/1/edit');
        
        $response->assertStatus(200);
    }

    /*Teste CRUD =====================================
    * ================================================
    ==================================================*/

    // Teste de criar produto
    public function testCreateProduct() {
        $response = $this->post('/products', [
            'nome' => 'Produto de Teste',
            'valor' => 10.99,
            'quantidade' => 10,
            'preco' => 19.99,
        ]);

        $response->assertStatus(302);

        //verifica se os dados foram inseridos corretamente
        $this->assertDatabaseHas('products', [
            'nome' => 'Produto de Teste',
            'valor' => 10.99,
            'quantidade' => 10,
            'preco' => 19.99,
        ]);
    }

    // Teste de editar produto
    public function testEditProduct() {
        $product = ProductFactory::new()->create([]); //Cria produtos aleatórios para que seja possível editar

        $response = $this->put("/products/{$product->id}", [
            'nome' => 'Produto Editado',
            'valor' => 36.25,
            'quantidade' => 96,
            'preco' => 15.21,
        ]);
    
        $response->assertStatus(302);
    
        // Verifique se os dados foram atualizados corretamente no banco de dados
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'nome' => 'Produto Editado',
            'valor' => 36.25,
            'quantidade' => 96,
            'preco' => 15.21,
        ]);
    }

    // Teste de apagar produto
    public function testDeleteProduct() {
        $product = ProductFactory::new()->create([]); //Cria produtos aleatórios para que seja possível apagar

        $response = $this->delete("/products/{$product->id}");
    
        $response->assertStatus(302);
    
        // Verifique se os dados foram deletados do banco de dados
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
