<?php

namespace Kamikaze3\Bundle\WriterApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Prefix;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Kamikaze3\Bundle\WriterCoreBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 * @package Kamikaze3\Bundle\WriterApiBundle\Controller
 *
 * @Prefix("/user")
 * @NamePrefix("user_")
 */
class UserController extends FOSRestController
{
    /**
     * @param Request $request
     * @Get("/{id}")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('Kamikaze3WriterCoreBundle:User');
        $user = $repository->find($id);

        $view = $this->view($user, 200)
                ->setTemplate("")
                ->setTemplateVar('user');

        return $this->handleView($view);
    }

    /**
     * @param Request $request
     * @Post("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $userService = $this->get('kamikaze3.writer.user');
        $validator = $this->get('validator');

        $user = $userService->createUserFromRequest($request);
        $errors = $validator->validate($user);

        if(count($errors) === 0)
        {
            $userService->saveUser($user);
            $view = $this->view($user, 200)
                    ->setTemplate("")
                    ->setTemplateVar("user");
        }
        else
        {
            $view = $this->view($errors, 400)
                    ->setTemplate("")
                    ->setTemplateVar("errors");
        }

        return $this->handleView($view);

    }

    /**
     * @param Request $request
     * @Post("/login")
     */
    public function loginAction(Request $request)
    {

    }

}
