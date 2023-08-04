<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\WithdrawTicket;

class WithdrawTicketApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/withdraw_tickets', $withdrawTicket
        );

        $this->assertApiResponse($withdrawTicket);
    }

    /**
     * @test
     */
    public function test_read_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/withdraw_tickets/'.$withdrawTicket->id
        );

        $this->assertApiResponse($withdrawTicket->toArray());
    }

    /**
     * @test
     */
    public function test_update_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->create();
        $editedWithdrawTicket = WithdrawTicket::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/withdraw_tickets/'.$withdrawTicket->id,
            $editedWithdrawTicket
        );

        $this->assertApiResponse($editedWithdrawTicket);
    }

    /**
     * @test
     */
    public function test_delete_withdraw_ticket()
    {
        $withdrawTicket = WithdrawTicket::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/withdraw_tickets/'.$withdrawTicket->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/withdraw_tickets/'.$withdrawTicket->id
        );

        $this->response->assertStatus(404);
    }
}
