<?php

namespace Ood;

class Validator
{
    public const PARAMS = ['minLength' => 8, 'containNumbers' => false];
    /**
     * @var array<string,mixed> Ood\Url::$params
     */
    public array $params = [];

    /**
     * @param array<string,mixed> $params
     */
    public function __construct(array $params = [])
    {
        $this->params = array_merge(self::PARAMS, $params);
    }

    private function hasNumber(string $pass): bool
    {
        return strpbrk($pass, '1234567890') !== false;
    }

    /**
     * @return array<string,mixed>
     */

    public function validate(string $pass): array
    {
        $length = mb_strlen($pass);

        $params = [];
        if ($length < $this->params['minLength']) {
            $params['minLength'] = 'too small';
        }
        if ($this->params['containNumbers'] === true) {
            if ($this->hasNumber($pass) === false) {
                $params['containNumbers'] = 'should contain at least one number';
            }
        }
        return $params;
    }
}
