<?php

namespace Ood\Stringer;

use function Symfony\Component\String\s;

function getQuestions(string $text): string
{
    $array = s($text)->split(PHP_EOL);
    $collection = collect($array)->filter(fn ($value) => str_ends_with(trim($value), '?'));

    $result = implode(PHP_EOL, $collection->all());
    return $result;
}
