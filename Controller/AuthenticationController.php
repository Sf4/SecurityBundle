<?php
/**
 * Created by PhpStorm.
 * Date: 10.07.18
 * Time: 20:50
 */

namespace Sf4\SecurityBundle\Controller;

use Sf4\PublicBundle\Controller\AbstractPublicController;

class AuthenticationController extends AbstractPublicController
{

    public function index()
    {
        return $this->json([
            'info' => 'Security index'
        ]);
    }

    public function login()
    {
        return $this->json([
            'info' => 'Login'
        ]);
    }

    public function register()
    {
        return $this->json([
            'info' => 'Register'
        ]);
    }
}
