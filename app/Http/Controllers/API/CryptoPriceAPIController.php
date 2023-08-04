<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCryptoPriceAPIRequest;
use App\Http\Requests\API\UpdateCryptoPriceAPIRequest;
use App\Models\CryptoPrice;
use App\Repositories\CryptoPriceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CryptoPriceController
 * @package App\Http\Controllers\API
 */

class CryptoPriceAPIController extends AppBaseController
{
    /** @var  CryptoPriceRepository */
    private $cryptoPriceRepository;

    public function __construct(CryptoPriceRepository $cryptoPriceRepo)
    {
        $this->cryptoPriceRepository = $cryptoPriceRepo;
    }

    /**
     * Display a listing of the CryptoPrice.
     * GET|HEAD /cryptoPrices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cryptoPrices = $this->cryptoPriceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cryptoPrices->toArray(), 'Crypto Prices retrieved successfully');
    }

    /**
     * Store a newly created CryptoPrice in storage.
     * POST /cryptoPrices
     *
     * @param CreateCryptoPriceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCryptoPriceAPIRequest $request)
    {
        $input = $request->all();

        $cryptoPrice = $this->cryptoPriceRepository->create($input);

        return $this->sendResponse($cryptoPrice->toArray(), 'Crypto Price saved successfully');
    }

    /**
     * Display the specified CryptoPrice.
     * GET|HEAD /cryptoPrices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CryptoPrice $cryptoPrice */
        $cryptoPrice = $this->cryptoPriceRepository->find($id);

        if (empty($cryptoPrice)) {
            return $this->sendError('Crypto Price not found');
        }

        return $this->sendResponse($cryptoPrice->toArray(), 'Crypto Price retrieved successfully');
    }

    /**
     * Update the specified CryptoPrice in storage.
     * PUT/PATCH /cryptoPrices/{id}
     *
     * @param int $id
     * @param UpdateCryptoPriceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCryptoPriceAPIRequest $request)
    {
        $input = $request->all();

        /** @var CryptoPrice $cryptoPrice */
        $cryptoPrice = $this->cryptoPriceRepository->find($id);

        if (empty($cryptoPrice)) {
            return $this->sendError('Crypto Price not found');
        }

        $cryptoPrice = $this->cryptoPriceRepository->update($input, $id);

        return $this->sendResponse($cryptoPrice->toArray(), 'CryptoPrice updated successfully');
    }

    /**
     * Remove the specified CryptoPrice from storage.
     * DELETE /cryptoPrices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CryptoPrice $cryptoPrice */
        $cryptoPrice = $this->cryptoPriceRepository->find($id);

        if (empty($cryptoPrice)) {
            return $this->sendError('Crypto Price not found');
        }

        $cryptoPrice->delete();

        return $this->sendSuccess('Crypto Price deleted successfully');
    }
}
