<?php
/**
 * Created by IntelliJ IDEA.
 * User: madsroskar
 * Date: 22/03/15
 * Time: 12:26
 */

namespace Kamikaze3\Bundle\WriterApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Prefix;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 * @package Kamikaze3\Bundle\WriterApiBundle\Controller
 *
 * @Prefix("/user")
 * @NamePrefix("user_")
 */
class UserController
{
    /**
     * @param Request $request
     * @Get("/{id}", name="show")
     */
    public function showAction(Request $request, $id)
    {

    }

    /**
     * @param Request $request
     * @Post("/", name="create")
     */
    public function createAction(Request $request)
    {

    }

    /**
     * @param Request $request
     * @Post("/login", name="login")
     */
    public function loginAction(Request $request)
    {

    }

}
