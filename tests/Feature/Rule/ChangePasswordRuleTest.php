<?php

namespace Tests\Feature\Rule;

use Modules\User\Rules\ChangePassword;
use Tests\TestCase;

/**
 * Class ChangePasswordRuleTest.
 */
class ChangePasswordRuleTest extends TestCase
{
    /** @test */
    public function a_password_can_be_validated()
    {
        $rule = ['password' => [new ChangePassword]];
        $this->assertFalse(validator(['password' => '1'], $rule)->passes());
        $this->assertFalse(validator(['password' => '1#'], $rule)->passes());
        $this->assertFalse(validator(['password' => 'a1#'], $rule)->passes());
        $this->assertFalse(validator(['password' => 'aB1#'], $rule)->passes());
        $this->assertTrue(validator(['password' => 'Abcd1234#'], $rule)->passes());
    }
}
