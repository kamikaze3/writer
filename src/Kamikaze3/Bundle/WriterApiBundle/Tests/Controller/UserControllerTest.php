<?php
/**
 * Created by IntelliJ IDEA.
 * User: madsroskar
 * Date: 22/03/15
 * Time: 19:13
 */

namespace Kamikaze3\Bundle\WriterApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    protected function createAuthenticatedClient($username = 'user', $password = 'password')
    {
        $client = static::createClient();
        $client->request(
                'POST',
                '/api/login_check',
                array(
                        'username' => $username,
                        'password' => $password,
                )
        );

        $data = json_decode($client->getResponse()->getContent(), true);

        $client = static::createClient();
        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));

        return $client;
    }

    public function testGetUser()
    {
        $client = $this->createAuthenticatedClient("test@example.com", "password");
        $client->request('GET', '/api/user/1');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
