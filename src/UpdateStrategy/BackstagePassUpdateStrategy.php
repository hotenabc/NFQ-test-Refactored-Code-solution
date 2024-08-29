<?php

declare(strict_types=1);

namespace Product\UpdateStrategy;

use Product\Item;

class BackstagePassUpdateStrategy implements UpdateStrategyInterface
{
    public function update(Item $item): void
    {
        if ($item->sellIn > 0) {
            $item->quality++;

            if ($item->sellIn <= 10 && $item->quality < 50) {
                $item->quality++;
            }

            if ($item->sellIn <= 5 && $item->quality < 50) {
                $item->quality++;
            }
        } else {
            $item->quality = 0;
        }

        $item->sellIn--;

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }
}
