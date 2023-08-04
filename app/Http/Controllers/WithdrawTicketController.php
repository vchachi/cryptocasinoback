<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWithdrawTicketRequest;
use App\Http\Requests\UpdateWithdrawTicketRequest;
use App\Repositories\WithdrawTicketRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WithdrawTicketController extends AppBaseController
{
    /** @var WithdrawTicketRepository $withdrawTicketRepository*/
    private $withdrawTicketRepository;

    public function __construct(WithdrawTicketRepository $withdrawTicketRepo)
    {
        $this->withdrawTicketRepository = $withdrawTicketRepo;
    }

    /**
     * Display a listing of the WithdrawTicket.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $withdrawTickets = $this->withdrawTicketRepository->all();

        return view('withdraw_tickets.index')
            ->with('withdrawTickets', $withdrawTickets);
    }

    /**
     * Show the form for creating a new WithdrawTicket.
     *
     * @return Response
     */
    public function create()
    {
        $tickets = \App\Models\Ticket::pluck('id','id');
        $withdraws = \App\Models\Withdraw::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('withdraw_tickets.create')->with(compact('tickets','withdraws','users'));
    }

    /**
     * Store a newly created WithdrawTicket in storage.
     *
     * @param CreateWithdrawTicketRequest $request
     *
     * @return Response
     */
    public function store(CreateWithdrawTicketRequest $request)
    {
        $input = $request->all();

        $withdrawTicket = $this->withdrawTicketRepository->create($input);

        Flash::success('Withdraw Ticket saved successfully.');

        return redirect(route('withdrawTickets.index'));
    }

    /**
     * Display the specified WithdrawTicket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $withdrawTicket = $this->withdrawTicketRepository->find($id);

        if (empty($withdrawTicket)) {
            Flash::error('Withdraw Ticket not found');

            return redirect(route('withdrawTickets.index'));
        }

        return view('withdraw_tickets.show')->with('withdrawTicket', $withdrawTicket);
    }

    /**
     * Show the form for editing the specified WithdrawTicket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $withdrawTicket = $this->withdrawTicketRepository->find($id);

        if (empty($withdrawTicket)) {
            Flash::error('Withdraw Ticket not found');

            return redirect(route('withdrawTickets.index'));
        }

        $tickets = \App\Models\Ticket::pluck('id','id');
        $withdraws = \App\Models\Withdraw::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('withdraw_tickets.edit')->with(compact('withdrawTicket', 'tickets','withdraws','users'));
    }

    /**
     * Update the specified WithdrawTicket in storage.
     *
     * @param int $id
     * @param UpdateWithdrawTicketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWithdrawTicketRequest $request)
    {
        $withdrawTicket = $this->withdrawTicketRepository->find($id);

        if (empty($withdrawTicket)) {
            Flash::error('Withdraw Ticket not found');

            return redirect(route('withdrawTickets.index'));
        }

        $withdrawTicket = $this->withdrawTicketRepository->update($request->all(), $id);

        Flash::success('Withdraw Ticket updated successfully.');

        return redirect(route('withdrawTickets.index'));
    }

    /**
     * Remove the specified WithdrawTicket from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $withdrawTicket = $this->withdrawTicketRepository->find($id);

        if (empty($withdrawTicket)) {
            Flash::error('Withdraw Ticket not found');

            return redirect(route('withdrawTickets.index'));
        }

        $this->withdrawTicketRepository->delete($id);

        Flash::success('Withdraw Ticket deleted successfully.');

        return redirect(route('withdrawTickets.index'));
    }
}
