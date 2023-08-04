<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CryptoPrice;

class CryptoPriceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/crypto_prices', $cryptoPrice
        );

        $this->assertApiResponse($cryptoPrice);
    }

    /**
     * @test
     */
    public function test_read_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/crypto_prices/'.$cryptoPrice->id
        );

        $this->assertApiResponse($cryptoPrice->toArray());
    }

    /**
     * @test
     */
    public function test_update_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->create();
        $editedCryptoPrice = CryptoPrice::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/crypto_prices/'.$cryptoPrice->id,
            $editedCryptoPrice
        );

        $this->assertApiResponse($editedCryptoPrice);
    }

    /**
     * @test
     */
    public function test_delete_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/crypto_prices/'.$cryptoPrice->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/crypto_prices/'.$cryptoPrice->id
        );

        $this->response->assertStatus(404);
    }
}
