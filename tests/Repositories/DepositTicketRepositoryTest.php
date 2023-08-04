<?php namespace Tests\Repositories;

use App\Models\DepositTicket;
use App\Repositories\DepositTicketRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DepositTicketRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepositTicketRepository
     */
    protected $depositTicketRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->depositTicketRepo = \App::make(DepositTicketRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->make()->toArray();

        $createdDepositTicket = $this->depositTicketRepo->create($depositTicket);

        $createdDepositTicket = $createdDepositTicket->toArray();
        $this->assertArrayHasKey('id', $createdDepositTicket);
        $this->assertNotNull($createdDepositTicket['id'], 'Created DepositTicket must have id specified');
        $this->assertNotNull(DepositTicket::find($createdDepositTicket['id']), 'DepositTicket with given id must be in DB');
        $this->assertModelData($depositTicket, $createdDepositTicket);
    }

    /**
     * @test read
     */
    public function test_read_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->create();

        $dbDepositTicket = $this->depositTicketRepo->find($depositTicket->id);

        $dbDepositTicket = $dbDepositTicket->toArray();
        $this->assertModelData($depositTicket->toArray(), $dbDepositTicket);
    }

    /**
     * @test update
     */
    public function test_update_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->create();
        $fakeDepositTicket = DepositTicket::factory()->make()->toArray();

        $updatedDepositTicket = $this->depositTicketRepo->update($fakeDepositTicket, $depositTicket->id);

        $this->assertModelData($fakeDepositTicket, $updatedDepositTicket->toArray());
        $dbDepositTicket = $this->depositTicketRepo->find($depositTicket->id);
        $this->assertModelData($fakeDepositTicket, $dbDepositTicket->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->create();

        $resp = $this->depositTicketRepo->delete($depositTicket->id);

        $this->assertTrue($resp);
        $this->assertNull(DepositTicket::find($depositTicket->id), 'DepositTicket should not exist in DB');
    }
}
