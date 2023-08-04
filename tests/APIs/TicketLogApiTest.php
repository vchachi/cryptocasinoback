<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TicketLog;

class TicketLogApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ticket_log()
    {
        $ticketLog = TicketLog::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ticket_logs', $ticketLog
        );

        $this->assertApiResponse($ticketLog);
    }

    /**
     * @test
     */
    public function test_read_ticket_log()
    {
        $ticketLog = TicketLog::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ticket_logs/'.$ticketLog->id
        );

        $this->assertApiResponse($ticketLog->toArray());
    }

    /**
     * @test
     */
    public function test_update_ticket_log()
    {
        $ticketLog = TicketLog::factory()->create();
        $editedTicketLog = TicketLog::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ticket_logs/'.$ticketLog->id,
            $editedTicketLog
        );

        $this->assertApiResponse($editedTicketLog);
    }

    /**
     * @test
     */
    public function test_delete_ticket_log()
    {
        $ticketLog = TicketLog::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ticket_logs/'.$ticketLog->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ticket_logs/'.$ticketLog->id
        );

        $this->response->assertStatus(404);
    }
}
