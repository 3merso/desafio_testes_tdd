<?php
namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $produto;

    public function setUp(): void
    {
        $this->produto = new Produto();
    }

    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setName('P1');
        $this->assertEquals('P1', $produto->getName());
    }

    public function testSeOPrecoDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setPrice('1.11');
        $this->assertEquals('1.11', $produto->getPrice());
    }

    public function testSeOSlugDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setSlug('P-1');
        $this->assertEquals('P-1', $produto->getSlug());
    }
}