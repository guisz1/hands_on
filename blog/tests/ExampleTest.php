<?php

namespace Tests;


class ExampleTest extends TestCase
{

    public function testarDataDeHoje()
    {
        $this->get('/messagem');

        $this->assertEquals(200, $this->response->getResponse()->getStatusCode());
    }
    public function testarDataDeNatal()
    {
        $this->get('/messagem?data=12/25/2000');
        $this->assertEquals(200, $this->response->getResponse()->getStatusCode());
    }
    public function testarDataformatoErrado()
    {
        $this->get('/messagem?data=25/12/2000');

        $this->assertEquals(400, $this->response->getResponse()->getStatusCode());
    }
}
