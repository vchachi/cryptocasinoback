<?php namespace Tests\Repositories;

use App\Models\Crypto;
use App\Repositories\CryptoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CryptoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CryptoRepository
     */
    protected $cryptoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cryptoRepo = \App::make(CryptoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_crypto()
    {
        $crypto = Crypto::factory()->make()->toArray();

        $createdCrypto = $this->cryptoRepo->create($crypto);

        $createdCrypto = $createdCrypto->toArray();
        $this->assertArrayHasKey('id', $createdCrypto);
        $this->assertNotNull($createdCrypto['id'], 'Created Crypto must have id specified');
        $this->assertNotNull(Crypto::find($createdCrypto['id']), 'Crypto with given id must be in DB');
        $this->assertModelData($crypto, $createdCrypto);
    }

    /**
     * @test read
     */
    public function test_read_crypto()
    {
        $crypto = Crypto::factory()->create();

        $dbCrypto = $this->cryptoRepo->find($crypto->id);

        $dbCrypto = $dbCrypto->toArray();
        $this->assertModelData($crypto->toArray(), $dbCrypto);
    }

    /**
     * @test update
     */
    public function test_update_crypto()
    {
        $crypto = Crypto::factory()->create();
        $fakeCrypto = Crypto::factory()->make()->toArray();

        $updatedCrypto = $this->cryptoRepo->update($fakeCrypto, $crypto->id);

        $this->assertModelData($fakeCrypto, $updatedCrypto->toArray());
        $dbCrypto = $this->cryptoRepo->find($crypto->id);
        $this->assertModelData($fakeCrypto, $dbCrypto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_crypto()
    {
        $crypto = Crypto::factory()->create();

        $resp = $this->cryptoRepo->delete($crypto->id);

        $this->assertTrue($resp);
        $this->assertNull(Crypto::find($crypto->id), 'Crypto should not exist in DB');
    }
}
