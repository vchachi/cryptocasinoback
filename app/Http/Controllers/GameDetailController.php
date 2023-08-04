<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameDetailRequest;
use App\Http\Requests\UpdateGameDetailRequest;
use App\Repositories\GameDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GameDetailController extends AppBaseController
{
    /** @var GameDetailRepository $gameDetailRepository*/
    private $gameDetailRepository;

    public function __construct(GameDetailRepository $gameDetailRepo)
    {
        $this->gameDetailRepository = $gameDetailRepo;
    }

    /**
     * Display a listing of the GameDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $gameDetails = $this->gameDetailRepository->all();

        return view('game_details.index')
            ->with('gameDetails', $gameDetails);
    }

    /**
     * Show the form for creating a new GameDetail.
     *
     * @return Response
     */
    public function create()
    {
        $game_types = \App\Models\GameType::pluck('name','id');
        $customers = \App\Models\Customer::pluck('name','id');
        $users = \App\Models\User::pluck('name','id');

        return view('game_details.create')->with(compact('game_types','customers','users'));
    }

    /**
     * Store a newly created GameDetail in storage.
     *
     * @param CreateGameDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateGameDetailRequest $request)
    {
        $input = $request->all();

        $gameDetail = $this->gameDetailRepository->create($input);

        Flash::success('Game Detail saved successfully.');

        return redirect(route('gameDetails.index'));
    }

    /**
     * Display the specified GameDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gameDetail = $this->gameDetailRepository->find($id);

        if (empty($gameDetail)) {
            Flash::error('Game Detail not found');

            return redirect(route('gameDetails.index'));
        }

        return view('game_details.show')->with('gameDetail', $gameDetail);
    }

    /**
     * Show the form for editing the specified GameDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gameDetail = $this->gameDetailRepository->find($id);

        if (empty($gameDetail)) {
            Flash::error('Game Detail not found');

            return redirect(route('gameDetails.index'));
        }

        $game_types = \App\Models\GameType::pluck('name','id');
        $customers = \App\Models\Customer::pluck('name','id');
        $users = \App\Models\User::pluck('name','id');

        return view('game_details.edit')->with(compact('gameDetail', 'game_types','customers','users'));
    }

    /**
     * Update the specified GameDetail in storage.
     *
     * @param int $id
     * @param UpdateGameDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGameDetailRequest $request)
    {
        $gameDetail = $this->gameDetailRepository->find($id);

        if (empty($gameDetail)) {
            Flash::error('Game Detail not found');

            return redirect(route('gameDetails.index'));
        }

        $gameDetail = $this->gameDetailRepository->update($request->all(), $id);

        Flash::success('Game Detail updated successfully.');

        return redirect(route('gameDetails.index'));
    }

    /**
     * Remove the specified GameDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gameDetail = $this->gameDetailRepository->find($id);

        if (empty($gameDetail)) {
            Flash::error('Game Detail not found');

            return redirect(route('gameDetails.index'));
        }

        $this->gameDetailRepository->delete($id);

        Flash::success('Game Detail deleted successfully.');

        return redirect(route('gameDetails.index'));
    }
}
