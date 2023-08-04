<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Withdraw;

class WithdrawApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_withdraw()
    {
        $withdraw = Withdraw::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/withdraws', $withdraw
        );

        $this->assertApiResponse($withdraw);
    }

    /**
     * @test
     */
    public function test_read_withdraw()
    {
        $withdraw = Withdraw::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/withdraws/'.$withdraw->id
        );

        $this->assertApiResponse($withdraw->toArray());
    }

    /**
     * @test
     */
    public function test_update_withdraw()
    {
        $withdraw = Withdraw::factory()->create();
        $editedWithdraw = Withdraw::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/withdraws/'.$withdraw->id,
            $editedWithdraw
        );

        $this->assertApiResponse($editedWithdraw);
    }

    /**
     * @test
     */
    public function test_delete_withdraw()
    {
        $withdraw = Withdraw::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/withdraws/'.$withdraw->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/withdraws/'.$withdraw->id
        );

        $this->response->assertStatus(404);
    }
}
