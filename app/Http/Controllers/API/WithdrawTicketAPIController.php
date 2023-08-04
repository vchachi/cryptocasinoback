<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWithdrawTicketAPIRequest;
use App\Http\Requests\API\UpdateWithdrawTicketAPIRequest;
use App\Models\WithdrawTicket;
use App\Repositories\WithdrawTicketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class WithdrawTicketController
 * @package App\Http\Controllers\API
 */

class WithdrawTicketAPIController extends AppBaseController
{
    /** @var  WithdrawTicketRepository */
    private $withdrawTicketRepository;

    public function __construct(WithdrawTicketRepository $withdrawTicketRepo)
    {
        $this->withdrawTicketRepository = $withdrawTicketRepo;
    }

    /**
     * Display a listing of the WithdrawTicket.
     * GET|HEAD /withdrawTickets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $withdrawTickets = $this->withdrawTicketRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($withdrawTickets->toArray(), 'Withdraw Tickets retrieved successfully');
    }

    /**
     * Store a newly created WithdrawTicket in storage.
     * POST /withdrawTickets
     *
     * @param CreateWithdrawTicketAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWithdrawTicketAPIRequest $request)
    {
        $input = $request->all();

        $withdrawTicket = $this->withdrawTicketRepository->create($input);

        return $this->sendResponse($withdrawTicket->toArray(), 'Withdraw Ticket saved successfully');
    }

    /**
     * Display the specified WithdrawTicket.
     * GET|HEAD /withdrawTickets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var WithdrawTicket $withdrawTicket */
        $withdrawTicket = $this->withdrawTicketRepository->find($id);

        if (empty($withdrawTicket)) {
            return $this->sendError('Withdraw Ticket not found');
        }

        return $this->sendResponse($withdrawTicket->toArray(), 'Withdraw Ticket retrieved successfully');
    }

    /**
     * Update the specified WithdrawTicket in storage.
     * PUT/PATCH /withdrawTickets/{id}
     *
     * @param int $id
     * @param UpdateWithdrawTicketAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWithdrawTicketAPIRequest $request)
    {
        $input = $request->all();

        /** @var WithdrawTicket $withdrawTicket */
        $withdrawTicket = $this->withdrawTicketRepository->find($id);

        if (empty($withdrawTicket)) {
            return $this->sendError('Withdraw Ticket not found');
        }

        $withdrawTicket = $this->withdrawTicketRepository->update($input, $id);

        return $this->sendResponse($withdrawTicket->toArray(), 'WithdrawTicket updated successfully');
    }

    /**
     * Remove the specified WithdrawTicket from storage.
     * DELETE /withdrawTickets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var WithdrawTicket $withdrawTicket */
        $withdrawTicket = $this->withdrawTicketRepository->find($id);

        if (empty($withdrawTicket)) {
            return $this->sendError('Withdraw Ticket not found');
        }

        $withdrawTicket->delete();

        return $this->sendSuccess('Withdraw Ticket deleted successfully');
    }
}
