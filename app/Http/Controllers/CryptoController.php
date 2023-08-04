<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCryptoRequest;
use App\Http\Requests\UpdateCryptoRequest;
use App\Repositories\CryptoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CryptoController extends AppBaseController
{
    /** @var CryptoRepository $cryptoRepository*/
    private $cryptoRepository;

    public function __construct(CryptoRepository $cryptoRepo)
    {
        $this->cryptoRepository = $cryptoRepo;
    }

    /**
     * Display a listing of the Crypto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cryptos = $this->cryptoRepository->all();

        return view('cryptos.index')
            ->with('cryptos', $cryptos);
    }

    /**
     * Show the form for creating a new Crypto.
     *
     * @return Response
     */
    public function create()
    {
        return view('cryptos.create');
    }

    /**
     * Store a newly created Crypto in storage.
     *
     * @param CreateCryptoRequest $request
     *
     * @return Response
     */
    public function store(CreateCryptoRequest $request)
    {
        $input = $request->all();

        $crypto = $this->cryptoRepository->create($input);

        Flash::success('Crypto saved successfully.');

        return redirect(route('cryptos.index'));
    }

    /**
     * Display the specified Crypto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $crypto = $this->cryptoRepository->find($id);

        if (empty($crypto)) {
            Flash::error('Crypto not found');

            return redirect(route('cryptos.index'));
        }

        return view('cryptos.show')->with('crypto', $crypto);
    }

    /**
     * Show the form for editing the specified Crypto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $crypto = $this->cryptoRepository->find($id);

        if (empty($crypto)) {
            Flash::error('Crypto not found');

            return redirect(route('cryptos.index'));
        }

        return view('cryptos.edit')->with('crypto', $crypto);
    }

    /**
     * Update the specified Crypto in storage.
     *
     * @param int $id
     * @param UpdateCryptoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCryptoRequest $request)
    {
        $crypto = $this->cryptoRepository->find($id);

        if (empty($crypto)) {
            Flash::error('Crypto not found');

            return redirect(route('cryptos.index'));
        }

        $crypto = $this->cryptoRepository->update($request->all(), $id);

        Flash::success('Crypto updated successfully.');

        return redirect(route('cryptos.index'));
    }

    /**
     * Remove the specified Crypto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $crypto = $this->cryptoRepository->find($id);

        if (empty($crypto)) {
            Flash::error('Crypto not found');

            return redirect(route('cryptos.index'));
        }

        $this->cryptoRepository->delete($id);

        Flash::success('Crypto deleted successfully.');

        return redirect(route('cryptos.index'));
    }
}
