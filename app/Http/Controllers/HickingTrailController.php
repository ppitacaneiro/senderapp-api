<?php

namespace App\Http\Controllers;

use App\Http\Requests\HickingTrailPostRequest;
use App\Http\Resources\HickingTrailResource;
use App\Models\HickingTrail;
use App\Services\HickingTrailService;
use Illuminate\Http\Request;

class HickingTrailController extends Controller
{
    private HickingTrailService $hickingTrailService;
    public function __construct(HickingTrailService $hickingTrailService) 
    {
        $this->hickingTrailService = $hickingTrailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HickingTrailPostRequest $request)
    {
        $hickingTrail = $this->hickingTrailService->create($request->validated());

        return new HickingTrailResource($hickingTrail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HickingTrail  $hickingTrail
     * @return \Illuminate\Http\Response
     */
    public function show(HickingTrail $hickingTrail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HickingTrail  $hickingTrail
     * @return \Illuminate\Http\Response
     */
    public function edit(HickingTrail $hickingTrail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HickingTrail  $hickingTrail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HickingTrail $hickingTrail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HickingTrail  $hickingTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(HickingTrail $hickingTrail)
    {
        //
    }
}
