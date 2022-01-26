<?php

require_once __DIR__ . '/vendor/autoload.php';

use function Ood\Stringer\getQuestions;

$text = <<<HEREDOC
lala\r\nr
ehu?
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
HEREDOC;

$result = getQuestions($text); // "ehu?\none two?"
print_r($result);
// ehu?
// one two?
