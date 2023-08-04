<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositTicketDetailRequest;
use App\Http\Requests\UpdateDepositTicketDetailRequest;
use App\Repositories\DepositTicketDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DepositTicketDetailController extends AppBaseController
{
    /** @var DepositTicketDetailRepository $depositTicketDetailRepository*/
    private $depositTicketDetailRepository;

    public function __construct(DepositTicketDetailRepository $depositTicketDetailRepo)
    {
        $this->depositTicketDetailRepository = $depositTicketDetailRepo;
    }

    /**
     * Display a listing of the DepositTicketDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $depositTicketDetails = $this->depositTicketDetailRepository->all();

        return view('deposit_ticket_details.index')
            ->with('depositTicketDetails', $depositTicketDetails);
    }

    /**
     * Show the form for creating a new DepositTicketDetail.
     *
     * @return Response
     */
    public function create()
    {
        $deposit_tickets = \App\Models\DepositTicket::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('deposit_ticket_details.create')->with(compact('deposit_tickets','users'));
    }

    /**
     * Store a newly created DepositTicketDetail in storage.
     *
     * @param CreateDepositTicketDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositTicketDetailRequest $request)
    {
        $input = $request->all();

        $depositTicketDetail = $this->depositTicketDetailRepository->create($input);

        Flash::success('Deposit Ticket Detail saved successfully.');

        return redirect(route('depositTicketDetails.index'));
    }

    /**
     * Display the specified DepositTicketDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $depositTicketDetail = $this->depositTicketDetailRepository->find($id);

        if (empty($depositTicketDetail)) {
            Flash::error('Deposit Ticket Detail not found');

            return redirect(route('depositTicketDetails.index'));
        }

        return view('deposit_ticket_details.show')->with('depositTicketDetail', $depositTicketDetail);
    }

    /**
     * Show the form for editing the specified DepositTicketDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $depositTicketDetail = $this->depositTicketDetailRepository->find($id);

        if (empty($depositTicketDetail)) {
            Flash::error('Deposit Ticket Detail not found');

            return redirect(route('depositTicketDetails.index'));
        }

        $deposit_tickets = \App\Models\DepositTicket::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('deposit_ticket_details.edit')->with(compact('depositTicketDetail', 'deposit_tickets','users'));
    }

    /**
     * Update the specified DepositTicketDetail in storage.
     *
     * @param int $id
     * @param UpdateDepositTicketDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositTicketDetailRequest $request)
    {
        $depositTicketDetail = $this->depositTicketDetailRepository->find($id);

        if (empty($depositTicketDetail)) {
            Flash::error('Deposit Ticket Detail not found');

            return redirect(route('depositTicketDetails.index'));
        }

        $depositTicketDetail = $this->depositTicketDetailRepository->update($request->all(), $id);

        Flash::success('Deposit Ticket Detail updated successfully.');

        return redirect(route('depositTicketDetails.index'));
    }

    /**
     * Remove the specified DepositTicketDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $depositTicketDetail = $this->depositTicketDetailRepository->find($id);

        if (empty($depositTicketDetail)) {
            Flash::error('Deposit Ticket Detail not found');

            return redirect(route('depositTicketDetails.index'));
        }

        $this->depositTicketDetailRepository->delete($id);

        Flash::success('Deposit Ticket Detail deleted successfully.');

        return redirect(route('depositTicketDetails.index'));
    }
}
