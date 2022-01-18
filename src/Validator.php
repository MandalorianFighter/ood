<?php

namespace Ood;

class PasswordValidator
{
    public const PARAMS = ['minLength' => 8, 'containNumbers' => false];
    public $params = [];

    public function __construct($params = [])
    {
        $this->params = array_merge(self::PARAMS, $params);
    }

    private function hasNumber($pass) 
    {
        return strpbrk($pass, '1234567890') !== false;
    }

    public function validate($pass)
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
