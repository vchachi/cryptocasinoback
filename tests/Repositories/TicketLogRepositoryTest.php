<?php namespace Tests\Repositories;

use App\Models\TicketLog;
use App\Repositories\TicketLogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TicketLogRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TicketLogRepository
     */
    protected $ticketLogRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ticketLogRepo = \App::make(TicketLogRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ticket_log()
    {
        $ticketLog = TicketLog::factory()->make()->toArray();

        $createdTicketLog = $this->ticketLogRepo->create($ticketLog);

        $createdTicketLog = $createdTicketLog->toArray();
        $this->assertArrayHasKey('id', $createdTicketLog);
        $this->assertNotNull($createdTicketLog['id'], 'Created TicketLog must have id specified');
        $this->assertNotNull(TicketLog::find($createdTicketLog['id']), 'TicketLog with given id must be in DB');
        $this->assertModelData($ticketLog, $createdTicketLog);
    }

    /**
     * @test read
     */
    public function test_read_ticket_log()
    {
        $ticketLog = TicketLog::factory()->create();

        $dbTicketLog = $this->ticketLogRepo->find($ticketLog->id);

        $dbTicketLog = $dbTicketLog->toArray();
        $this->assertModelData($ticketLog->toArray(), $dbTicketLog);
    }

    /**
     * @test update
     */
    public function test_update_ticket_log()
    {
        $ticketLog = TicketLog::factory()->create();
        $fakeTicketLog = TicketLog::factory()->make()->toArray();

        $updatedTicketLog = $this->ticketLogRepo->update($fakeTicketLog, $ticketLog->id);

        $this->assertModelData($fakeTicketLog, $updatedTicketLog->toArray());
        $dbTicketLog = $this->ticketLogRepo->find($ticketLog->id);
        $this->assertModelData($fakeTicketLog, $dbTicketLog->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ticket_log()
    {
        $ticketLog = TicketLog::factory()->create();

        $resp = $this->ticketLogRepo->delete($ticketLog->id);

        $this->assertTrue($resp);
        $this->assertNull(TicketLog::find($ticketLog->id), 'TicketLog should not exist in DB');
    }
}
