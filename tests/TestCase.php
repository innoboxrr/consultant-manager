<?php

namespace Innoboxrr\ConsultantManager\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{

    public function setUp(): void
    {
        
        parent::setUp();
        // additional setup

    }

    protected function getPackageProviders($app)
    {
        
        return [
            //
        ];

    }

    protected function getEnvironmentSetUp($app)
    {
        
        // perform environment setup

        $app['config']->set('test.token', 'access_token_here'); // Replace access_token_here with your token

    }

}