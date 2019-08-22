<?php

use \PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;

class ApiTokenAuthenticatorTest extends TestCase
{
    public function requestValidUrl() : void
    {
        $url = Faker::create('FR-fr')->url;
        $subject = new ApiTokenAuthenticatorTest($url);

        $this->assertInstanceOf(ApiTokenAuthenticatorTest::class, $subject);

    }
}