<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCryptoPriceRequest;
use App\Http\Requests\UpdateCryptoPriceRequest;
use App\Repositories\CryptoPriceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CryptoPriceController extends AppBaseController
{
    /** @var CryptoPriceRepository $cryptoPriceRepository*/
    private $cryptoPriceRepository;

    public function __construct(CryptoPriceRepository $cryptoPriceRepo)
    {
        $this->cryptoPriceRepository = $cryptoPriceRepo;
    }

    /**
     * Display a listing of the CryptoPrice.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cryptoPrices = $this->cryptoPriceRepository->all();

        return view('crypto_prices.index')
            ->with('cryptoPrices', $cryptoPrices);
    }

    /**
     * Show the form for creating a new CryptoPrice.
     *
     * @return Response
     */
    public function create()
    {
        $cryptos = \App\Models\Crypto::pluck('name','id');

        return view('crypto_prices.create')->with(compact('cryptos'));
    }

    /**
     * Store a newly created CryptoPrice in storage.
     *
     * @param CreateCryptoPriceRequest $request
     *
     * @return Response
     */
    public function store(CreateCryptoPriceRequest $request)
    {
        $input = $request->all();

        $cryptoPrice = $this->cryptoPriceRepository->create($input);

        Flash::success('Crypto Price saved successfully.');

        return redirect(route('cryptoPrices.index'));
    }

    /**
     * Display the specified CryptoPrice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cryptoPrice = $this->cryptoPriceRepository->find($id);

        if (empty($cryptoPrice)) {
            Flash::error('Crypto Price not found');

            return redirect(route('cryptoPrices.index'));
        }

        return view('crypto_prices.show')->with('cryptoPrice', $cryptoPrice);
    }

    /**
     * Show the form for editing the specified CryptoPrice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cryptoPrice = $this->cryptoPriceRepository->find($id);

        if (empty($cryptoPrice)) {
            Flash::error('Crypto Price not found');

            return redirect(route('cryptoPrices.index'));
        }

        $cryptos = \App\Models\Crypto::pluck('name','id');

        return view('crypto_prices.edit')->with(compact('cryptoPrice','cryptos'));
    }

    /**
     * Update the specified CryptoPrice in storage.
     *
     * @param int $id
     * @param UpdateCryptoPriceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCryptoPriceRequest $request)
    {
        $cryptoPrice = $this->cryptoPriceRepository->find($id);

        if (empty($cryptoPrice)) {
            Flash::error('Crypto Price not found');

            return redirect(route('cryptoPrices.index'));
        }

        $cryptoPrice = $this->cryptoPriceRepository->update($request->all(), $id);

        Flash::success('Crypto Price updated successfully.');

        return redirect(route('cryptoPrices.index'));
    }

    /**
     * Remove the specified CryptoPrice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cryptoPrice = $this->cryptoPriceRepository->find($id);

        if (empty($cryptoPrice)) {
            Flash::error('Crypto Price not found');

            return redirect(route('cryptoPrices.index'));
        }

        $this->cryptoPriceRepository->delete($id);

        Flash::success('Crypto Price deleted successfully.');

        return redirect(route('cryptoPrices.index'));
    }
}
