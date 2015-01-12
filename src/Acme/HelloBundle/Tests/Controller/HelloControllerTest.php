<?php


namespace Acme\HelloBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
	public function testIndex()
    {
        $client = static::createClient(); // = browser

        $crawler = $client->request('GET', '/hello/Christophe/Gragnic'); // html result

        $this->assertTrue($crawler->filter('html:contains("Hello")')->count() === 1);

        $this->assertTrue($crawler->filter('html:contains("Christophe Gragnic")')->count() === 1);
    }
}