<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameTypeRequest;
use App\Http\Requests\UpdateGameTypeRequest;
use App\Repositories\GameTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GameTypeController extends AppBaseController
{
    /** @var GameTypeRepository $gameTypeRepository*/
    private $gameTypeRepository;

    public function __construct(GameTypeRepository $gameTypeRepo)
    {
        $this->gameTypeRepository = $gameTypeRepo;
    }

    /**
     * Display a listing of the GameType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $gameTypes = $this->gameTypeRepository->all();

        return view('game_types.index')
            ->with('gameTypes', $gameTypes);
    }

    /**
     * Show the form for creating a new GameType.
     *
     * @return Response
     */
    public function create()
    {
        return view('game_types.create');
    }

    /**
     * Store a newly created GameType in storage.
     *
     * @param CreateGameTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateGameTypeRequest $request)
    {
        $input = $request->all();

        $input['schema'] = json_decode($input['schema'] ?? '{}', true);
        $input['settings'] = json_decode($input['settings'] ?? '{}', true);

        $gameType = $this->gameTypeRepository->create($input);

        Flash::success('Game Type saved successfully.');

        return redirect(route('gameTypes.index'));
    }

    /**
     * Display the specified GameType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gameType = $this->gameTypeRepository->find($id);

        if (empty($gameType)) {
            Flash::error('Game Type not found');

            return redirect(route('gameTypes.index'));
        }

        return view('game_types.show')->with('gameType', $gameType);
    }

    /**
     * Show the form for editing the specified GameType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gameType = $this->gameTypeRepository->find($id);

        if (empty($gameType)) {
            Flash::error('Game Type not found');

            return redirect(route('gameTypes.index'));
        }

        return view('game_types.edit')->with('gameType', $gameType);
    }

    /**
     * Update the specified GameType in storage.
     *
     * @param int $id
     * @param UpdateGameTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGameTypeRequest $request)
    {
        $gameType = $this->gameTypeRepository->find($id);

        if (empty($gameType)) {
            Flash::error('Game Type not found');

            return redirect(route('gameTypes.index'));
        }

        $input = $request->all();

        info($input['schema']);
        info($input['settings']);

        $input['schema'] = json_decode($input['schema'] ?? '{}', true);
        $input['settings'] = json_decode($input['settings'] ?? '{}', true);

        info($input['schema']);
        info($input['settings']);

        $gameType = $this->gameTypeRepository->update($input, $id);

        Flash::success('Game Type updated successfully.');

        return redirect(route('gameTypes.index'));
    }

    /**
     * Remove the specified GameType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gameType = $this->gameTypeRepository->find($id);

        if (empty($gameType)) {
            Flash::error('Game Type not found');

            return redirect(route('gameTypes.index'));
        }

        $this->gameTypeRepository->delete($id);

        Flash::success('Game Type deleted successfully.');

        return redirect(route('gameTypes.index'));
    }
}
