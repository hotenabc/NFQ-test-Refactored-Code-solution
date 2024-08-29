<?php

declare(strict_types=1);

namespace Product\UpdateStrategy;

use Product\Item;

class ConjuredUpdateStrategy implements UpdateStrategyInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->sellIn >= 0) {
            $item->quality -= 2;  // Degrades twice as fast
        } else {
            // After sell-by date, degrade quality twice as fast
            $item->quality -= 4;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }
}
