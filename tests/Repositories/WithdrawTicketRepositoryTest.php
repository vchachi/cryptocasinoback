<?php namespace Tests\Repositories;

use App\Models\WithdrawTicket;
use App\Repositories\WithdrawTicketRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WithdrawTicketRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var WithdrawTicketRepository
     */
    protected $withdrawTicketRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->withdrawTicketRepo = \App::make(WithdrawTicketRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->make()->toArray();

        $createdWithdrawTicket = $this->withdrawTicketRepo->create($withdrawTicket);

        $createdWithdrawTicket = $createdWithdrawTicket->toArray();
        $this->assertArrayHasKey('id', $createdWithdrawTicket);
        $this->assertNotNull($createdWithdrawTicket['id'], 'Created WithdrawTicket must have id specified');
        $this->assertNotNull(WithdrawTicket::find($createdWithdrawTicket['id']), 'WithdrawTicket with given id must be in DB');
        $this->assertModelData($withdrawTicket, $createdWithdrawTicket);
    }

    /**
     * @test read
     */
    public function test_read_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->create();

        $dbWithdrawTicket = $this->withdrawTicketRepo->find($withdrawTicket->id);

        $dbWithdrawTicket = $dbWithdrawTicket->toArray();
        $this->assertModelData($withdrawTicket->toArray(), $dbWithdrawTicket);
    }

    /**
     * @test update
     */
    public function test_update_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->create();
        $fakeWithdrawTicket = WithdrawTicket::factory()->make()->toArray();

        $updatedWithdrawTicket = $this->withdrawTicketRepo->update($fakeWithdrawTicket, $withdrawTicket->id);

        $this->assertModelData($fakeWithdrawTicket, $updatedWithdrawTicket->toArray());
        $dbWithdrawTicket = $this->withdrawTicketRepo->find($withdrawTicket->id);
        $this->assertModelData($fakeWithdrawTicket, $dbWithdrawTicket->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->create();

        $resp = $this->withdrawTicketRepo->delete($withdrawTicket->id);

        $this->assertTrue($resp);
        $this->assertNull(WithdrawTicket::find($withdrawTicket->id), 'WithdrawTicket should not exist in DB');
    }
}
