<?php

namespace Ood;

class DeckOfCards
{
    /**
     * @var array<int, mixed> Ood\DeckOfCards::$deck
     */
    private array $deck = [];

    /**
     * @param array<int, mixed> $deck
     */
    public function __construct(array $deck)
    {
        $this->deck = $deck;
    }

    /**
     * @return array<int, mixed>
     */
    public function getShuffled(): array
    {
        $collection = collect($this->deck)->map(fn ($card) =>array_fill(0, 4, $card))->flatten()->shuffle();
        return $collection->all();
    }
}
