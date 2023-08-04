<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;
use App\Repositories\WithdrawRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WithdrawController extends AppBaseController
{
    /** @var WithdrawRepository $withdrawRepository*/
    private $withdrawRepository;

    public function __construct(WithdrawRepository $withdrawRepo)
    {
        $this->withdrawRepository = $withdrawRepo;
    }

    /**
     * Display a listing of the Withdraw.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $withdraws = $this->withdrawRepository->all();

        return view('withdraws.index')
            ->with('withdraws', $withdraws);
    }

    /**
     * Show the form for creating a new Withdraw.
     *
     * @return Response
     */
    public function create()
    {
        $customers = \App\Models\Customer::pluck('name','id');
        $cryptos = \App\Models\Crypto::pluck('name','id');
        $users = \App\Models\User::pluck('name','id');

        return view('withdraws.create')->with(compact('customers','cryptos','users'));
    }

    /**
     * Store a newly created Withdraw in storage.
     *
     * @param CreateWithdrawRequest $request
     *
     * @return Response
     */
    public function store(CreateWithdrawRequest $request)
    {
        $input = $request->all();

        $withdraw = $this->withdrawRepository->create($input);

        Flash::success('Withdraw saved successfully.');

        return redirect(route('withdraws.index'));
    }

    /**
     * Display the specified Withdraw.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $withdraw = $this->withdrawRepository->find($id);

        if (empty($withdraw)) {
            Flash::error('Withdraw not found');

            return redirect(route('withdraws.index'));
        }

        return view('withdraws.show')->with('withdraw', $withdraw);
    }

    /**
     * Show the form for editing the specified Withdraw.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $withdraw = $this->withdrawRepository->find($id);

        if (empty($withdraw)) {
            Flash::error('Withdraw not found');

            return redirect(route('withdraws.index'));
        }
        
        $customers = \App\Models\Customer::pluck('name','id');
        $cryptos = \App\Models\Crypto::pluck('name','id');
        $users = \App\Models\User::pluck('name','id');

        return view('withdraws.edit')->with(compact('withdraw', 'customers','cryptos','users'));
    }

    /**
     * Update the specified Withdraw in storage.
     *
     * @param int $id
     * @param UpdateWithdrawRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWithdrawRequest $request)
    {
        $withdraw = $this->withdrawRepository->find($id);

        if (empty($withdraw)) {
            Flash::error('Withdraw not found');

            return redirect(route('withdraws.index'));
        }

        $withdraw = $this->withdrawRepository->update($request->all(), $id);

        Flash::success('Withdraw updated successfully.');

        return redirect(route('withdraws.index'));
    }

    /**
     * Remove the specified Withdraw from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $withdraw = $this->withdrawRepository->find($id);

        if (empty($withdraw)) {
            Flash::error('Withdraw not found');

            return redirect(route('withdraws.index'));
        }

        $this->withdrawRepository->delete($id);

        Flash::success('Withdraw deleted successfully.');

        return redirect(route('withdraws.index'));
    }
}
