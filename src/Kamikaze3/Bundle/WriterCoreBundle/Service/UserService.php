<?php
/**
 * Created by IntelliJ IDEA.
 * User: madsroskar
 * Date: 22/03/15
 * Time: 15:22
 */

namespace Kamikaze3\Bundle\WriterCoreBundle\Service;


use Kamikaze3\Bundle\WriterCoreBundle\Entity\User;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class UserService
{
    protected $container;
    protected $userManager;

    public function __construct(Container $container)
    {
        $this->setContainer($container);
        $this->setUserManager($container->get('fos_user.user_manager'));
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getUserManager()
    {
        return $this->userManager;
    }

    /**
     * @param mixed $userManager
     */
    public function setUserManager($userManager)
    {
        $this->userManager = $userManager;
    }

    public function mapRequestDataToEntity(Request $request)
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        $user = $this->getUserManager()->createUser();
        $user->setEmail($email);
        $user->setUsername($email);
        $user->setPlainPassword($password);

        return $user;
    }

    public function createUserFromRequest(Request $request)
    {
        $user = $this->mapRequestDataToEntity($request);
        return $user;
    }

    public function saveUser($user)
    {
        $this->getUserManager()->updateUser($user);
    }

}
