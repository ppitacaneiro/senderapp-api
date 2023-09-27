<?php

namespace App\Http\Controllers;

use App\Http\Requests\HickingTrailPostRequest;
use App\Http\Resources\HickingTrailResource;
use App\Jobs\StoreHickingTrailSteps;
use App\Models\HickingTrail;
use App\Services\HickingTrailService;
use App\Services\PhotoService;
use App\Services\StepService;
use Illuminate\Http\Request;
use App\Jobs\StorePhotos;
use Illuminate\Support\Facades\Bus;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HickingTrailPostRequest $request)
    {
        $hickingTrail = $this->hickingTrailService->create($request->validated());
        Bus::chain([
            new StoreHickingTrailSteps($request->get('steps'), $hickingTrail->id),
            new StorePhotos($request->get('photos'), $hickingTrail->id),
            // TODO: send email to user
        ])->dispatch();

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
