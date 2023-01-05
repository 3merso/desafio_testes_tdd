<?php
namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    private $carrinho;
    private $produto;

    public function setUp(): void
    {
        $this->carrinho = new Carrinho();
        $this->produto = new Produto();
    }

    public function tearDown(): void
    {
        unset($this->carrinho);
        unset($this->produto);
    }

    public function testSeClasseCarrinhoExiste()
    {
        $classe = class_exists('\\Code\\Carrinho');
        $this->assertTrue($classe);
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto1 = $this->produto;
        $produto1->setName('p1');
        $produto1->setPrice(1);
        $produto1->setSlug('p-1');

        $produto2 = $this->produto;
        $produto2->setName('p2');
        $produto2->setPrice(2);
        $produto2->setSlug('p-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[0]);

    }

    public function testSeValoresDeProdutosNoCarrinhoEstaoCorretosConformePassado()
    {
        $produto2 = $this->produto;
        $produto2->setName('p2');
        $produto2->setPrice(2);
        $produto2->setSlug('p-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto2);

        $this->assertEquals('p2', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals('2', $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('p-2', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testSeTotalDeProdutosEValorDaCompraEstaoCorretos()
    {
        $produto2 = $this->produto;
        $produto2->setName('p2');
        $produto2->setPrice(2);
        $produto2->setSlug('p-2');

        $produto1 = $this->produto;
        $produto1->setName('p1');
        $produto1->setPrice(1);
        $produto1->setSlug('p-1');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto2);
        $carrinho->addProduto($produto1);

        $this->assertEquals(2, $carrinho->getTotalProdutos());
        $this->assertEquals(2, $carrinho->getTotalCompra());
    }
}