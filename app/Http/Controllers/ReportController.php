<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Database\Factories\chartFactory;

class ReportController extends Controller
{
    
    private $chartFactory;

    public function __construct(ChartFactory $cF)
	{
		$this->chartFactory = $cF;
	}
    
    public function chartGen(){

        $request = request()->all();
		if (empty($request)) {
			$new_year = date('Y');
			$maturity_year = date('Y');
		} else {
			$new_year = $request['new_year'];
			$maturity_year = $request['maturity_year'];
		}

        $newsByType = $this->chartFactory->newsByType($new_year);
        $newsByMonth = $this->chartFactory->newsByMonth($new_year);
        $stocksMaturity = $this->chartFactory->stocksMaturity($maturity_year);
        $facilityType = $this->chartFactory->facilityType($maturity_year);

        return view('dashboard', compact('new_year','newsByType', 'stocksMaturity', 'newsByMonth', 'facilityType', 'maturity_year'));
    }
}
