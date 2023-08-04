<?php namespace Tests\Repositories;

use App\Models\CryptoPrice;
use App\Repositories\CryptoPriceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CryptoPriceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CryptoPriceRepository
     */
    protected $cryptoPriceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cryptoPriceRepo = \App::make(CryptoPriceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->make()->toArray();

        $createdCryptoPrice = $this->cryptoPriceRepo->create($cryptoPrice);

        $createdCryptoPrice = $createdCryptoPrice->toArray();
        $this->assertArrayHasKey('id', $createdCryptoPrice);
        $this->assertNotNull($createdCryptoPrice['id'], 'Created CryptoPrice must have id specified');
        $this->assertNotNull(CryptoPrice::find($createdCryptoPrice['id']), 'CryptoPrice with given id must be in DB');
        $this->assertModelData($cryptoPrice, $createdCryptoPrice);
    }

    /**
     * @test read
     */
    public function test_read_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->create();

        $dbCryptoPrice = $this->cryptoPriceRepo->find($cryptoPrice->id);

        $dbCryptoPrice = $dbCryptoPrice->toArray();
        $this->assertModelData($cryptoPrice->toArray(), $dbCryptoPrice);
    }

    /**
     * @test update
     */
    public function test_update_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->create();
        $fakeCryptoPrice = CryptoPrice::factory()->make()->toArray();

        $updatedCryptoPrice = $this->cryptoPriceRepo->update($fakeCryptoPrice, $cryptoPrice->id);

        $this->assertModelData($fakeCryptoPrice, $updatedCryptoPrice->toArray());
        $dbCryptoPrice = $this->cryptoPriceRepo->find($cryptoPrice->id);
        $this->assertModelData($fakeCryptoPrice, $dbCryptoPrice->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_crypto_price()
    {
        $cryptoPrice = CryptoPrice::factory()->create();

        $resp = $this->cryptoPriceRepo->delete($cryptoPrice->id);

        $this->assertTrue($resp);
        $this->assertNull(CryptoPrice::find($cryptoPrice->id), 'CryptoPrice should not exist in DB');
    }
}
