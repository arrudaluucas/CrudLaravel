<?php

namespace App\Http\Controllers\Localization;

use App\Http\Controllers\Controller;
use App\Services\LocalizationService;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{   
    public $localizationService;

    public function __construct(LocalizationService $localizationService)
    {
        $this->localizationService = $localizationService;
    }


    public function getAllCitys(Request $request)
    {
        return $this->localizationService->getAllCitys($request->stateId);

    }

    public function getAllStates(Request $request)
    {
        return $this->localizationService->getAllStates();

    }
}
