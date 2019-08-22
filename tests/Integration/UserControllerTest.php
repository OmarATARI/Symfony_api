<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testGetUsers()
    {
        $client = static::createClient();
        $client->request('GET', '/api/users', [], [], ['HTTP_ACCEPT' => 'application/json']);

        $response = $client->getResponse();
        $content = $response->getContent();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($content);

        $arrayContent = \json_decode($content, true);
        $this->assertCount(10, $arrayContent);
    }

    public function testPostUsers()
    {
        $client = static::createClient();
        $client->request('POST', '/api/users', [], [], [
            'HTTP_ACCEPT' => 'application/json',
            'CONTENT_TYPE' => 'application/json',
            'HTTP_X-AUTH-TOKEN' => 'test'
        ],
        '{
            "id": 49,
            "firstName": "kkkk",
            "lastName": "hhhh",
            "email": "test@gmail.com",
            "birthday": "1990-09-18T00:00:00+02:00",
            "roles": [
                "ROLE_USER"
            ],
            "password": "fezfqzae",
            "username": "eeefsqd@fakeapple.com",
            "apiKey": "azerty"
            }'
        );

        $response = $client->getResponse();
        $content = $response->getContent();
        //dd($content);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($content);

        $client->request('DELETE', '/api/users/test@gmail.com', [], [], ['HTTP_ACCEPT' => 'application/json']);
    }

}