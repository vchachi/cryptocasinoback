<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DepositTicket;

class DepositTicketApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/deposit_tickets', $depositTicket
        );

        $this->assertApiResponse($depositTicket);
    }

    /**
     * @test
     */
    public function test_read_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/deposit_tickets/'.$depositTicket->id
        );

        $this->assertApiResponse($depositTicket->toArray());
    }

    /**
     * @test
     */
    public function test_update_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->create();
        $editedDepositTicket = DepositTicket::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/deposit_tickets/'.$depositTicket->id,
            $editedDepositTicket
        );

        $this->assertApiResponse($editedDepositTicket);
    }

    /**
     * @test
     */
    public function test_delete_deposit_ticket()
    {
        $depositTicket = DepositTicket::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/deposit_tickets/'.$depositTicket->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/deposit_tickets/'.$depositTicket->id
        );

        $this->response->assertStatus(404);
    }
}
