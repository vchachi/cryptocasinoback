<?php namespace Tests\Repositories;

use App\Models\DepositTicketDetail;
use App\Repositories\DepositTicketDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DepositTicketDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepositTicketDetailRepository
     */
    protected $depositTicketDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->depositTicketDetailRepo = \App::make(DepositTicketDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->make()->toArray();

        $createdDepositTicketDetail = $this->depositTicketDetailRepo->create($depositTicketDetail);

        $createdDepositTicketDetail = $createdDepositTicketDetail->toArray();
        $this->assertArrayHasKey('id', $createdDepositTicketDetail);
        $this->assertNotNull($createdDepositTicketDetail['id'], 'Created DepositTicketDetail must have id specified');
        $this->assertNotNull(DepositTicketDetail::find($createdDepositTicketDetail['id']), 'DepositTicketDetail with given id must be in DB');
        $this->assertModelData($depositTicketDetail, $createdDepositTicketDetail);
    }

    /**
     * @test read
     */
    public function test_read_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->create();

        $dbDepositTicketDetail = $this->depositTicketDetailRepo->find($depositTicketDetail->id);

        $dbDepositTicketDetail = $dbDepositTicketDetail->toArray();
        $this->assertModelData($depositTicketDetail->toArray(), $dbDepositTicketDetail);
    }

    /**
     * @test update
     */
    public function test_update_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->create();
        $fakeDepositTicketDetail = DepositTicketDetail::factory()->make()->toArray();

        $updatedDepositTicketDetail = $this->depositTicketDetailRepo->update($fakeDepositTicketDetail, $depositTicketDetail->id);

        $this->assertModelData($fakeDepositTicketDetail, $updatedDepositTicketDetail->toArray());
        $dbDepositTicketDetail = $this->depositTicketDetailRepo->find($depositTicketDetail->id);
        $this->assertModelData($fakeDepositTicketDetail, $dbDepositTicketDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->create();

        $resp = $this->depositTicketDetailRepo->delete($depositTicketDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(DepositTicketDetail::find($depositTicketDetail->id), 'DepositTicketDetail should not exist in DB');
    }
}
