<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTicketLogAPIRequest;
use App\Http\Requests\API\UpdateTicketLogAPIRequest;
use App\Models\TicketLog;
use App\Repositories\TicketLogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TicketLogController
 * @package App\Http\Controllers\API
 */

class TicketLogAPIController extends AppBaseController
{
    /** @var  TicketLogRepository */
    private $ticketLogRepository;

    public function __construct(TicketLogRepository $ticketLogRepo)
    {
        $this->ticketLogRepository = $ticketLogRepo;
    }

    /**
     * Display a listing of the TicketLog.
     * GET|HEAD /ticketLogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ticketLogs = $this->ticketLogRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ticketLogs->toArray(), 'Ticket Logs retrieved successfully');
    }

    /**
     * Store a newly created TicketLog in storage.
     * POST /ticketLogs
     *
     * @param CreateTicketLogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketLogAPIRequest $request)
    {
        $input = $request->all();

        $ticketLog = $this->ticketLogRepository->create($input);

        return $this->sendResponse($ticketLog->toArray(), 'Ticket Log saved successfully');
    }

    /**
     * Display the specified TicketLog.
     * GET|HEAD /ticketLogs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TicketLog $ticketLog */
        $ticketLog = $this->ticketLogRepository->find($id);

        if (empty($ticketLog)) {
            return $this->sendError('Ticket Log not found');
        }

        return $this->sendResponse($ticketLog->toArray(), 'Ticket Log retrieved successfully');
    }

    /**
     * Update the specified TicketLog in storage.
     * PUT/PATCH /ticketLogs/{id}
     *
     * @param int $id
     * @param UpdateTicketLogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTicketLogAPIRequest $request)
    {
        $input = $request->all();

        /** @var TicketLog $ticketLog */
        $ticketLog = $this->ticketLogRepository->find($id);

        if (empty($ticketLog)) {
            return $this->sendError('Ticket Log not found');
        }

        $ticketLog = $this->ticketLogRepository->update($input, $id);

        return $this->sendResponse($ticketLog->toArray(), 'TicketLog updated successfully');
    }

    /**
     * Remove the specified TicketLog from storage.
     * DELETE /ticketLogs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TicketLog $ticketLog */
        $ticketLog = $this->ticketLogRepository->find($id);

        if (empty($ticketLog)) {
            return $this->sendError('Ticket Log not found');
        }

        $ticketLog->delete();

        return $this->sendSuccess('Ticket Log deleted successfully');
    }
}
