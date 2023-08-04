<?php namespace Tests\Repositories;

use App\Models\DepositDetail;
use App\Repositories\DepositDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DepositDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepositDetailRepository
     */
    protected $depositDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->depositDetailRepo = \App::make(DepositDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->make()->toArray();

        $createdDepositDetail = $this->depositDetailRepo->create($depositDetail);

        $createdDepositDetail = $createdDepositDetail->toArray();
        $this->assertArrayHasKey('id', $createdDepositDetail);
        $this->assertNotNull($createdDepositDetail['id'], 'Created DepositDetail must have id specified');
        $this->assertNotNull(DepositDetail::find($createdDepositDetail['id']), 'DepositDetail with given id must be in DB');
        $this->assertModelData($depositDetail, $createdDepositDetail);
    }

    /**
     * @test read
     */
    public function test_read_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->create();

        $dbDepositDetail = $this->depositDetailRepo->find($depositDetail->id);

        $dbDepositDetail = $dbDepositDetail->toArray();
        $this->assertModelData($depositDetail->toArray(), $dbDepositDetail);
    }

    /**
     * @test update
     */
    public function test_update_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->create();
        $fakeDepositDetail = DepositDetail::factory()->make()->toArray();

        $updatedDepositDetail = $this->depositDetailRepo->update($fakeDepositDetail, $depositDetail->id);

        $this->assertModelData($fakeDepositDetail, $updatedDepositDetail->toArray());
        $dbDepositDetail = $this->depositDetailRepo->find($depositDetail->id);
        $this->assertModelData($fakeDepositDetail, $dbDepositDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->create();

        $resp = $this->depositDetailRepo->delete($depositDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(DepositDetail::find($depositDetail->id), 'DepositDetail should not exist in DB');
    }
}
