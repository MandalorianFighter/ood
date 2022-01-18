<?php

namespace Ood\Tests;

use PHPUnit\Framework\TestCase;
use Ood\PasswordValidator;


class ValidatorTest extends TestCase
{

    public function testValidateWithDefaultOptions(): void
    {
        $validator = new PasswordValidator();

        $errors1 = $validator->validate('qwertyui');

        $this->assertEmpty($errors1);
    }

    public function testValidateWithOptions(): void
    {
        $validator = new PasswordValidator([
            'containNumbers' => true
        ]);
        $errors1 = $validator->validate('qwertya3sdf');
        $this->assertEmpty($errors1);
    }

    public function testValidateWithIncorrectOptions(): void
    {
        $validator = new PasswordValidator([
            'containNumberz' => null
        ]);
        $errors1 = $validator->validate('qwertya3sdf');
        $this->assertEmpty($errors1);
 
        $errors2 = $validator->validate('qwerty');
        $this->assertEquals([
            'minLength' => 'too small'
        ], $errors2);
    }
}
