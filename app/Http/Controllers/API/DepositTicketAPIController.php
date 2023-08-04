<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepositTicketAPIRequest;
use App\Http\Requests\API\UpdateDepositTicketAPIRequest;
use App\Models\DepositTicket;
use App\Repositories\DepositTicketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DepositTicketController
 * @package App\Http\Controllers\API
 */

class DepositTicketAPIController extends AppBaseController
{
    /** @var  DepositTicketRepository */
    private $depositTicketRepository;

    public function __construct(DepositTicketRepository $depositTicketRepo)
    {
        $this->depositTicketRepository = $depositTicketRepo;
    }

    /**
     * Display a listing of the DepositTicket.
     * GET|HEAD /depositTickets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $depositTickets = $this->depositTicketRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($depositTickets->toArray(), 'Deposit Tickets retrieved successfully');
    }

    /**
     * Store a newly created DepositTicket in storage.
     * POST /depositTickets
     *
     * @param CreateDepositTicketAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositTicketAPIRequest $request)
    {
        $input = $request->all();

        $depositTicket = $this->depositTicketRepository->create($input);

        return $this->sendResponse($depositTicket->toArray(), 'Deposit Ticket saved successfully');
    }

    /**
     * Display the specified DepositTicket.
     * GET|HEAD /depositTickets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DepositTicket $depositTicket */
        $depositTicket = $this->depositTicketRepository->find($id);

        if (empty($depositTicket)) {
            return $this->sendError('Deposit Ticket not found');
        }

        return $this->sendResponse($depositTicket->toArray(), 'Deposit Ticket retrieved successfully');
    }

    /**
     * Update the specified DepositTicket in storage.
     * PUT/PATCH /depositTickets/{id}
     *
     * @param int $id
     * @param UpdateDepositTicketAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositTicketAPIRequest $request)
    {
        $input = $request->all();

        /** @var DepositTicket $depositTicket */
        $depositTicket = $this->depositTicketRepository->find($id);

        if (empty($depositTicket)) {
            return $this->sendError('Deposit Ticket not found');
        }

        $depositTicket = $this->depositTicketRepository->update($input, $id);

        return $this->sendResponse($depositTicket->toArray(), 'DepositTicket updated successfully');
    }

    /**
     * Remove the specified DepositTicket from storage.
     * DELETE /depositTickets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DepositTicket $depositTicket */
        $depositTicket = $this->depositTicketRepository->find($id);

        if (empty($depositTicket)) {
            return $this->sendError('Deposit Ticket not found');
        }

        $depositTicket->delete();

        return $this->sendSuccess('Deposit Ticket deleted successfully');
    }
}
