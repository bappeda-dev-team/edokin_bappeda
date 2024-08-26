<?php

namespace Tests\Unit\Http\Api;

use Tests\TestCase;
use App\Http\Api\KakKotaMadiunApi;

class KakKotaMadiunApiTest extends TestCase
{

    public function testHealthCheck(): void
    {
        $kakApi = new KakKotaMadiunApi();
        $response = $kakApi->healthCheck();

        $this->assertEquals(200, $response->status());
        $this->assertEquals("online", $response->json('status'));
    }

    public function testUrusanOpd(): void
    {
        $kakApi = new KakKotaMadiunApi();
        $response = $kakApi->urusanOpd();

        $this->assertEquals(200, $response->status());
        $this->assertArrayHasKey('results', $response->json());
    }

    public function testPermasalahanOpd(): void
    {
        $kakApi = new KakKotaMadiunApi();
        $response = $kakApi->permasalahanOpd(
            kode_opd: '5.03.5.04.0.00.01.0000',
            tahun: '2024'
        );

        $this->assertEquals(200, $response->status());
        $this->assertArrayHasKey('results', $response->json());
    }

    public function testTujuanOpd(): void
    {
        $kakApi = new KakKotaMadiunApi();
        $response = $kakApi->tujuanOpd(kode_opd: '5.03.5.04.0.00.01.0000');

        $this->assertEquals(200, $response->status());
        $this->assertArrayHasKey('results', $response->json());
    }

    public function testSasaranOpd(): void
    {
        $kakApi = new KakKotaMadiunApi();
        $response = $kakApi->sasaranOpd(
            kode_opd: '5.03.5.04.0.00.01.0000',
            tahun: '2024'
        );

        $this->assertEquals(200, $response->status());
        $this->assertArrayHasKey('results', $response->json());
    }
}
