<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Crypto;

class CryptoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_crypto()
    {
        $crypto = Crypto::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cryptos', $crypto
        );

        $this->assertApiResponse($crypto);
    }

    /**
     * @test
     */
    public function test_read_crypto()
    {
        $crypto = Crypto::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cryptos/'.$crypto->id
        );

        $this->assertApiResponse($crypto->toArray());
    }

    /**
     * @test
     */
    public function test_update_crypto()
    {
        $crypto = Crypto::factory()->create();
        $editedCrypto = Crypto::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cryptos/'.$crypto->id,
            $editedCrypto
        );

        $this->assertApiResponse($editedCrypto);
    }

    /**
     * @test
     */
    public function test_delete_crypto()
    {
        $crypto = Crypto::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cryptos/'.$crypto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cryptos/'.$crypto->id
        );

        $this->response->assertStatus(404);
    }
}
