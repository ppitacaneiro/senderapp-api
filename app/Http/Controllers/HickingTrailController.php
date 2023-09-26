<?php

namespace App\Http\Controllers;

use App\Http\Requests\HickingTrailPostRequest;
use App\Http\Resources\HickingTrailResource;
use App\Models\HickingTrail;
use App\Services\HickingTrailService;
use App\Services\StepService;
use Illuminate\Http\Request;

class HickingTrailController extends Controller
{
    private HickingTrailService $hickingTrailService;
    private StepService $stepService;
    public function __construct(
        HickingTrailService $hickingTrailService,
        StepService $stepService,
    ) 
    {
        $this->hickingTrailService = $hickingTrailService;
        $this->stepService = $stepService;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HickingTrailPostRequest $request)
    {
        $hickingTrail = $this->hickingTrailService->create($request->validated());
        $steps = $request->get('steps');
        // TODO: Make this in background
        $this->stepService->storeSteps($steps, $hickingTrail->id);

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
