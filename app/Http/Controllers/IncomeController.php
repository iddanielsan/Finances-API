<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreIncomeRequest;
use App\Services\IncomeService;

class IncomeController extends Controller
{
    public function __construct(IncomeService $incomeService)
    {
        $this->incomeService = $incomeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json($this->incomeService->index(), 200);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => true,
                "message" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        try {
            return response()->json($this->incomeService->store($request), 201);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => true,
                "message" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->incomeService->destroy($id);
            return response()->json(["error" => false], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => true,
                "message" => $th->getMessage()
            ], 500);
        }

    }
}
