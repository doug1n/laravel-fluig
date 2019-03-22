<?php
/**
 * Created by PhpStorm.
 * User: dougl
 * Date: 22/03/2019
 * Time: 16:46
 */

namespace dougvobel\Fluig\Tests\Traits;


trait EnvironmentSetUp
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('fluig', [
            'domain' => env('FLUIG_DOMAIN'),
            'user' => env('FLUIG_USERNAME'),
            'userId' => env('FLUIG_USERNAME_ID'),
            'password' => env('FLUIG_PASSWORD')
        ]);
    }
}