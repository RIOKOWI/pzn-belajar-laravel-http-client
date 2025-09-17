<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\assertTrue;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpTest extends TestCase
{
    // http method

    public function testGet(): void
    {
        $response = Http::get('https://eop92rn4erpqpm2.m.pipedream.net');

        self::assertTrue($response->ok());
    }
    public function testPost(): void
    {
        $response = Http::post('https://eop92rn4erpqpm2.m.pipedream.net');

        self::assertTrue($response->ok());
    }
    public function testDelete(): void
    {
        $response = Http::delete('https://eop92rn4erpqpm2.m.pipedream.net');

        self::assertTrue($response->ok());
    }

    // response 
    public function testResponse()
    {
        $response = Http::get('https://eop92rn4erpqpm2.m.pipedream.net');
        self::assertEquals(200, $response->status());
        self::assertNotNull($response->headers());
        self::assertNotNull($response->body());

        $json = $response->json();
        self::assertIsArray($json);
    }
}
