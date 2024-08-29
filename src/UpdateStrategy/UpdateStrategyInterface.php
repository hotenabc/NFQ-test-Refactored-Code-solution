<?php

declare(strict_types=1);

namespace Product\UpdateStrategy;

use Product\Item;

interface UpdateStrategyInterface
{
    public function update(Item $item): void;
}
