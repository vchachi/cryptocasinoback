<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositTicketRequest;
use App\Http\Requests\UpdateDepositTicketRequest;
use App\Repositories\DepositTicketRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DepositTicketController extends AppBaseController
{
    /** @var DepositTicketRepository $depositTicketRepository*/
    private $depositTicketRepository;

    public function __construct(DepositTicketRepository $depositTicketRepo)
    {
        $this->depositTicketRepository = $depositTicketRepo;
    }

    /**
     * Display a listing of the DepositTicket.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $depositTickets = $this->depositTicketRepository->all();

        return view('deposit_tickets.index')
            ->with('depositTickets', $depositTickets);
    }

    /**
     * Show the form for creating a new DepositTicket.
     *
     * @return Response
     */
    public function create()
    {
        $tickets = \App\Models\Ticket::pluck('id','id');
        $deposits = \App\Models\Deposit::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('deposit_tickets.create')->with(compact('tickets','deposits','users'));
    }

    /**
     * Store a newly created DepositTicket in storage.
     *
     * @param CreateDepositTicketRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositTicketRequest $request)
    {
        $input = $request->all();

        $depositTicket = $this->depositTicketRepository->create($input);

        Flash::success('Deposit Ticket saved successfully.');

        return redirect(route('depositTickets.index'));
    }

    /**
     * Display the specified DepositTicket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $depositTicket = $this->depositTicketRepository->find($id);

        if (empty($depositTicket)) {
            Flash::error('Deposit Ticket not found');

            return redirect(route('depositTickets.index'));
        }

        return view('deposit_tickets.show')->with('depositTicket', $depositTicket);
    }

    /**
     * Show the form for editing the specified DepositTicket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $depositTicket = $this->depositTicketRepository->find($id);

        if (empty($depositTicket)) {
            Flash::error('Deposit Ticket not found');

            return redirect(route('depositTickets.index'));
        }

        $tickets = \App\Models\Ticket::pluck('id','id');
        $deposits = \App\Models\Deposit::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('deposit_tickets.edit')->with(compact('depositTicket', 'tickets','deposits','users'));
    }

    /**
     * Update the specified DepositTicket in storage.
     *
     * @param int $id
     * @param UpdateDepositTicketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositTicketRequest $request)
    {
        $depositTicket = $this->depositTicketRepository->find($id);

        if (empty($depositTicket)) {
            Flash::error('Deposit Ticket not found');

            return redirect(route('depositTickets.index'));
        }

        $depositTicket = $this->depositTicketRepository->update($request->all(), $id);

        Flash::success('Deposit Ticket updated successfully.');

        return redirect(route('depositTickets.index'));
    }

    /**
     * Remove the specified DepositTicket from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $depositTicket = $this->depositTicketRepository->find($id);

        if (empty($depositTicket)) {
            Flash::error('Deposit Ticket not found');

            return redirect(route('depositTickets.index'));
        }

        $this->depositTicketRepository->delete($id);

        Flash::success('Deposit Ticket deleted successfully.');

        return redirect(route('depositTickets.index'));
    }
}
