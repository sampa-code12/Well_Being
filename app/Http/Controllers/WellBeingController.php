<?php

namespace App\Http\Controllers;

use App\Services\WellBeingProgramService;

class WellBeingController extends Controller
{
    public function __construct(private readonly WellBeingProgramService $programService)
    {
    }

    public function index()
    {
        $axes = $this->programService->axes();
        $objectives = $this->programService->objectives();
        $metrics = $this->programService->dashboardMetrics();
        $globalObjective = $this->programService->globalObjective();

        return view('wellbeing.index', compact('axes', 'objectives', 'metrics', 'globalObjective'));
    }
}
