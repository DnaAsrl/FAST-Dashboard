<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\all_announcements;

class chartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function announcement(){

    }

    public function facility(){
        
    }

    public function newsByType($start){

        $statData = [];
        array_push($statData, ['Type', 'Total']);

        $general = all_announcements::selectraw('count(news_id) as total')->whereraw('news_type like "GENERAL ANNOUNCEMENT" and year(embargo_date) like '.$start)->get();
        $members = all_announcements::selectraw('count(news_id) as total')->whereraw('news_type like "NEWS FROM MEMBERS" and year(embargo_date) like '.$start)->get();
        $rating = all_announcements::selectraw('count(news_id) as total')->whereraw('news_type like "RATING ANNOUNCEMENT" and year(embargo_date) like '.$start)->get();
        $tender = all_announcements::selectraw('count(news_id) as total')->whereraw('news_type like "TENDER CANCELLATION" and year(embargo_date) like '.$start)->get();
        
        $ttlCount = $general[0]->total + $members[0]->total + $rating[0]->total + $tender[0]->total;

        array_push($statData, ['GENERAL ANNOUNCEMENT', $general[0]->total > 0  ? round($general[0]->total / $ttlCount * 100) : 0 ]);
        array_push($statData, ['NEWS FROM MEMBERS', $members[0]->total > 0 ? round($members[0]->total / $ttlCount * 100) : 0 ]);
        array_push($statData, ['RATING ANNOUNCEMENT', $rating[0]->total > 0 ? round($rating[0]->total / $ttlCount * 100) : 0 ]);
        array_push($statData, ['TENDER CANCELLATION', $tender[0]->total > 0 ? round($tender[0]->total / $ttlCount * 100) : 0 ]);

        return $statData;
    }

    public function newsByMonth($start){

        $statData = [];
        array_push($statData, ['News', 'Total']);

        $months = all_announcements::selectraw('distinct monthname(embargo_date) as month')->whereraw('year(embargo_date) like '.$start)->get();

        foreach($months as $month) {
            $total = all_announcements::selectraw('count(news_type) as total')
                        ->whereraw('monthname(embargo_date) like "'. $month->month .'" and year(embargo_date) like '.$start)->get();
            array_push($statData, [$month->month, $total[0]->total]);
        };

        return $statData;
    }

    public function stocksMaturity($start){

        $statData = [];
        array_push($statData, ['Instrument Type', 'Count']);

        $months = DB::table('stock_information')->selectraw('distinct monthname(maturity_date) as month')->whereraw('year(maturity_date) like '.$start)->get();

        foreach($months as $month) {
            $total =DB::table('stock_information')->selectraw('count(instrument_id) as total')
                        ->whereraw('monthname(maturity_date) like "'. $month->month .'" and year(maturity_date) like '.$start)->get();
            array_push($statData, [$month->month, $total[0]->total]);
        };

        return $statData;

    }

    public function facilityType($start){
        
        $statData = [];
        array_push($statData, ['Type', 'Total']);

        $islamic = DB::table('facility_information')->where('principle','ISLAMIC')->whereraw('Year(maturity_date) like '.$start)->count();
        $conv = DB::table('facility_information')->where('principle','CONVENTIONAL')->whereraw('Year(maturity_date) like '.$start)->count();
        
        $ttlCount = $islamic + $conv ;

        array_push($statData, ['ISLAMIC', $islamic > 0 ? round($islamic / $ttlCount * 100) : 0 ]);
        array_push($statData, ['CONVENTIONAL', $conv > 0 ? round($conv / $ttlCount * 100) : 0 ]);

        return $statData;

    }
}
