<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Product\Product;
use Product\Item;

echo 'NFQ-GREAT!' . PHP_EOL;

$items = [
    new Item('+5 Dexterity Vest', 10, 20),
    new Item('Aged Brie', 2, 0),
    new Item('Elixir of the Mongoose', 5, 7),
    new Item('Sulfuras', 0, 80),
    new Item('Sulfuras', -1, 80),
    new Item('Backstage passes', 15, 20),
    new Item('Backstage passes', 10, 49),
    new Item('Backstage passes', 5, 49),
    // this conjured item does not work properly yet
    new Item('Conjured', 3, 6),
];

$app = new Product($items);

$days = 7;
if ((is_countable($argv) ? count($argv) : 0) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo "-------- day {$i} --------" . PHP_EOL;
    echo 'name, sellIn, quality' . PHP_EOL;
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
