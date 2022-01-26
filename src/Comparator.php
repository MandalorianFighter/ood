<?php

namespace Ood\Comparator;

use Ds\Stack;

function formNewStr(string $seq): string
{
    $stack = new Stack();
    $bs = '#';
    for ($i = 0, $length = mb_strlen($seq); $i < $length; $i++) {
        $curr = $seq[$i];

        if ($curr !== $bs) {
            $stack->push($curr);
        } elseif (!$stack->isEmpty()) {
            $stack->pop();
        }
    }
    $arr = $stack->toArray();
    $result = implode('', $arr);
    return $result;
}

function compare(string $seq1, string $seq2): bool
{
    return formNewStr($seq1) === formNewStr($seq2);
}
