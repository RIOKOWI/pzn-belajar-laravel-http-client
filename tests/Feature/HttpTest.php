<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\assertTrue;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\RequestException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpTest extends TestCase
{
    // http method

    // public function testGet(): void
    // {
    //     $response = Http::get('https://eop92rn4erpqpm2.m.pipedream.net');

    //     self::assertTrue($response->ok());
    // }
    // public function testPost(): void
    // {
    //     $response = Http::post('https://eop92rn4erpqpm2.m.pipedream.net');

    //     self::assertTrue($response->ok());
    // }
    // public function testDelete(): void
    // {
    //     $response = Http::delete('https://eop92rn4erpqpm2.m.pipedream.net');

    //     self::assertTrue($response->ok());
    // }

    // // response 
    // public function testResponse()
    // {
    //     $response = Http::get('https://eop92rn4erpqpm2.m.pipedream.net');
    //     self::assertEquals(200, $response->status());
    //     self::assertNotNull($response->headers());
    //     self::assertNotNull($response->body());

    //     $json = $response->json();
    //     self::assertIsArray($json);
    // }

    // // query parameter
    // public function testQueryParam()
    // {
    //     $response = Http::withQueryParameters([
    //         'page' => 1,
    //         'limit' => 10,
    //     ])->get('https://eop92rn4erpqpm2.m.pipedream.net');

    //     self::assertTrue($response->ok());
    // }

    // // header
    // public function testHeader()
    // {
    //     $response = Http::withQueryParameters([
    //         'page' => 1,
    //         'limit' => 10,
    //     ])->withHeaders([
    //         'Accept' => 'application/json',
    //         'X-required-Id' => '123456789',
    //     ])
    //     ->get('https://eop92rn4erpqpm2.m.pipedream.net');

    //     self::assertTrue($response->ok());
    // }

    // // cookie
    // public function testCookie()
    // {
    //     $response = Http::withQueryParameters([
    //         'page' => 1,
    //         'limit' => 10,
    //     ])->withHeaders([
    //         'Accept' => 'application/json',
    //         'X-required-Id' => '123456789',
    //     ])->withCookies([
    //         'SessionId' => '123456789',
    //         'UserId' => '1',
    //     ], 'eop92rn4erpqpm2.m.pipedream.net')
    //     ->get('https://eop92rn4erpqpm2.m.pipedream.net');

    //     self::assertTrue($response->ok());
    // }

    // // form post
    // public function testFormPost()
    // {
    //     $response = Http::asForm()->post('https://eop92rn4erpqpm2.m.pipedream.net',[
    //         'username' => 'rio',
    //         'password' => '12435',
    //     ]);

    //     self::assertTrue($response->ok());
    // }
    
    // multipart
    // public function testMultipart()
    // {
    //     $response = Http::asMultipart()
    //     ->attach('profile', file_get_contents(__DIR__ . '\..\pictures\cafe.png'), 'embut.jpg')
    //     ->post('https://eop92rn4erpqpm2.m.pipedream.net',[
    //         'username' => 'rio',
    //         'password' => '12435',
    //     ]);
        
    //     self::assertTrue($response->ok());

    // }

    //json
    // public function testJson()
    // {
    //     $response = Http::asJson()->post('https://eop92rn4erpqpm2.m.pipedream.net' ,[
    //         'username' => 'rio',
    //         'password' => '12435',
    //     ]);

    //     self::assertTrue($response->ok());
    // }

    // timeout
    // public function testTimeOut()
    // {
    //     $response = Http::timeout(2)->asJson()->post('https://eop92rn4erpqpm2.m.pipedream.net' ,[
    //         'username' => 'rio',
    //         'password' => '12435',
    //     ]);

    //     self::assertTrue($response->ok());
    // }

    // retry
    public function testRetry()
    {
        $response = Http::timeout(2)->retry(5, 1000)->post('https://eop92rn4erpqpm2.m.pipedream.net' ,[
            'username' => 'rio',
            'password' => '12435',
        ]);

        self::assertTrue($response->ok());
    }

    // throw error
    public function testThrowError()
    {
        $this->assertThrows( function()
            {
                $response = Http::get('https://www.rioputi.com/mbut');
                self::assertEquals(404, $response->status());
                $response->throw();
            }, RequestException::class);
    }
}
