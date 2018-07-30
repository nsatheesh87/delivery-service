<?php

/**
 * Class PigeonTest
 */
class PigeonTest extends TestCase
{
    /**
     * @var null
     */
    protected $send_headers = null;
    protected $send_json = null;
    protected $receive_json = null;

    public function setUp()
    {
        parent::setUp();
    }


    /**
     *
     */
    public function testSomethingIsTrue()
    {
        $this->assertTrue(true);
    }

    /**
     *
     */
    public function testApplication()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

    /**
     *
     */
    public function testValidateNoPigeon()
    {
        $this->send_json    = '{
                                    "distance":"4000",
                                    "deadline":"31/07/2018"
                                }';

        $this->send_headers = [ 'CONTENT_TYPE' => 'application/json' ];
        $this->call(
            'POST',
            'api/v1/pigeon',
            [],
            [],
            [],
            $this->send_headers,
            $this->send_json
        );
        $this->receive_json = json_decode($this->response->getContent());
        $this->assertEquals(200, $this->response->status());
        $this->assertTrue($this->receive_json->data[0]->data == 'Pigeon is not available');
    }
}