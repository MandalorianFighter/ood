<?php

namespace Ood\Normalizer;

/**
 * @param array<string,string> $arr
 * @return array<string,string>
 */

function normalize(array $arr): array
{
    $collection = collect($arr)->map(fn ($value) =>
    array_map(fn ($item) =>
        trim(mb_strtolower($item)), $value));

    $result = $collection->mapToGroups(function ($item, $key) {
        return [$item['country'] => $item['name']];
    })->map(fn ($cities) =>
        $cities->unique()->sort()->values())->sortKeys()->all();

    return $result;
}
