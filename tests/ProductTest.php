<?php

declare(strict_types=1);

namespace Tests;

use Product\Product;
use Product\Item;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $product = new Product($items);
        $product->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }
}
