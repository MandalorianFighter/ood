<?php

namespace Ood\Tests;

use PHPUnit\Framework\TestCase;
use Ood\Validator;

class ValidatorTest extends TestCase
{
    public function testValidateWithDefaultOptions(): void
    {
        $validator = new Validator();

        $errors1 = $validator->validate('qwertyui');

        $this->assertEmpty($errors1);
    }

    public function testValidateWithOptions(): void
    {
        $validator = new Validator([
            'containNumbers' => true
        ]);
        $errors1 = $validator->validate('qwertya3sdf');
        $this->assertEmpty($errors1);
    }

    public function testValidateWithIncorrectOptions(): void
    {
        $validator = new Validator([
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
