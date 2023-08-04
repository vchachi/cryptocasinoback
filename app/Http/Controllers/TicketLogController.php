<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketLogRequest;
use App\Http\Requests\UpdateTicketLogRequest;
use App\Repositories\TicketLogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TicketLogController extends AppBaseController
{
    /** @var TicketLogRepository $ticketLogRepository*/
    private $ticketLogRepository;

    public function __construct(TicketLogRepository $ticketLogRepo)
    {
        $this->ticketLogRepository = $ticketLogRepo;
    }

    /**
     * Display a listing of the TicketLog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ticketLogs = $this->ticketLogRepository->all();

        return view('ticket_logs.index')
            ->with('ticketLogs', $ticketLogs);
    }

    /**
     * Show the form for creating a new TicketLog.
     *
     * @return Response
     */
    public function create()
    {
        $tickets = \App\Models\Ticket::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('ticket_logs.create')->with(compact('tickets','users'));
    }

    /**
     * Store a newly created TicketLog in storage.
     *
     * @param CreateTicketLogRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketLogRequest $request)
    {
        $input = $request->all();

        $ticketLog = $this->ticketLogRepository->create($input);

        Flash::success('Ticket Log saved successfully.');

        return redirect(route('ticketLogs.index'));
    }

    /**
     * Display the specified TicketLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticketLog = $this->ticketLogRepository->find($id);

        if (empty($ticketLog)) {
            Flash::error('Ticket Log not found');

            return redirect(route('ticketLogs.index'));
        }

        return view('ticket_logs.show')->with('ticketLog', $ticketLog);
    }

    /**
     * Show the form for editing the specified TicketLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ticketLog = $this->ticketLogRepository->find($id);

        if (empty($ticketLog)) {
            Flash::error('Ticket Log not found');

            return redirect(route('ticketLogs.index'));
        }

        $tickets = \App\Models\Ticket::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('ticket_logs.edit')->with(compact('ticketLog', 'tickets','users'));
    }

    /**
     * Update the specified TicketLog in storage.
     *
     * @param int $id
     * @param UpdateTicketLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTicketLogRequest $request)
    {
        $ticketLog = $this->ticketLogRepository->find($id);

        if (empty($ticketLog)) {
            Flash::error('Ticket Log not found');

            return redirect(route('ticketLogs.index'));
        }

        $ticketLog = $this->ticketLogRepository->update($request->all(), $id);

        Flash::success('Ticket Log updated successfully.');

        return redirect(route('ticketLogs.index'));
    }

    /**
     * Remove the specified TicketLog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ticketLog = $this->ticketLogRepository->find($id);

        if (empty($ticketLog)) {
            Flash::error('Ticket Log not found');

            return redirect(route('ticketLogs.index'));
        }

        $this->ticketLogRepository->delete($id);

        Flash::success('Ticket Log deleted successfully.');

        return redirect(route('ticketLogs.index'));
    }
}
