<?php

declare(strict_types=1);

namespace Product\Service;

use Product\Item;
use Product\UpdateStrategy\AgedBrieUpdateStrategy;
use Product\UpdateStrategy\BackstagePassUpdateStrategy;
use Product\UpdateStrategy\ConjuredUpdateStrategy;
use Product\UpdateStrategy\DefaultUpdateStrategy;
use Product\UpdateStrategy\SulfurasUpdateStrategy;

class ItemUpdater
{
    private array $strategies;

    public function __construct(array $customStrategies = [])
    {
        $defaultStrategies = [
            'Aged Brie' => new AgedBrieUpdateStrategy(),
            'Backstage passes' => new BackstagePassUpdateStrategy(),
            'Sulfuras' => new SulfurasUpdateStrategy(),
            'Conjured' => new ConjuredUpdateStrategy(),
            'default' => new DefaultUpdateStrategy(),
        ];

        $this->strategies = array_merge($defaultStrategies, $customStrategies);
    }

    public function updateItem(Item $item): void
    {
        $strategy = $this->strategies[$item->name] ?? $this->strategies['default'];
        $strategy->update($item);
    }
}
