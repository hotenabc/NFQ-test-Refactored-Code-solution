<?php

declare(strict_types=1);

namespace Product\UpdateStrategy;

use Product\Item;

class DefaultUpdateStrategy implements UpdateStrategyInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->sellIn >= 0) {
            $item->quality--;
        } else {
            $item->quality -= 2;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }
}
