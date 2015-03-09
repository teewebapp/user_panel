<?php

namespace Tee\User\Tests;

use Tee\System\Tests\TestCase;

class InitializeTest extends TestCase {

    public function testSomethingIsTrue()
    {
        $this->assertTrue(\moduleEnabled('user'));
        $this->assertTrue(\moduleEnabled('user_panel'));
        $this->assertTrue(\moduleEnabled('system'));
    }

}
