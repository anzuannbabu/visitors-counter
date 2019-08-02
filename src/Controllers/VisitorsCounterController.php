<?php
namespace Anzuann\VisitorsCounter\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Anzuann\VisitorsCounter\Models\VisitorsCounter;
use Carbon\Carbon;


class VisitorsCounterController extends Controller {
	//visitors counter implementation
	
	public function createCounter(){
		$data = [
			"status" => 200,
			"message" => "Creating new entry to track visitors logs is under maintanance"
		];
		return response()->json($data);
	}

	public function log(Request $request)
	{
		$client = VisitorsCounter::where('browserId','=',$request->browserId)->get()->last();
		if($client){
            //update
			$logs = $client->save($request->all());
			if(!$logs) {
				return response()->json(['error'=>[
					'status' => 401,
					'message' => 'Bad Request',
					'details' => 'Failed to record the log'
				]],200);
			}
			$logs = $client;
		} else {
            //create new log
			$logs = VisitorsCounter::create($request->all());
			if(!$logs) {
				return response()->json(['error'=>[
					'status' => 401,
					'message' => 'Bad Request',
					'details' => 'Failed to record the log'
				]],200);
			}
		}
		
		$data = [
			'today' => number_format($this->today()->count()),
			'yesterday' => number_format($this->yesterday()->count()),
			'thisWeek' => number_format($this->thisWeek()->count()),
			'thisMonth' => number_format($this->thisMonth()->count()),
			'all' => number_format($this->all()->count())
		];
		return response()->json($data,200);
	}

	public function viewLogs(){
		$data = [
			'today' => number_format($this->today()->count()),
			'yesterday' => number_format($this->yesterday()->count()),
			'thisWeek' => number_format($this->thisWeek()->count()),
			'thisMonth' => number_format($this->thisMonth()->count()),
			'all' => number_format($this->all()->count())
		];
		return response()->json($data,200);
	}

	public function all()
	{
		return VisitorsCounter::all();
	}


	public function today(){
		return VisitorsCounter::whereDate('created_at', '=', Carbon::today()->toDateString())->get();
	}

	public function yesterday(){
		return VisitorsCounter::whereDate('created_at', '=', Carbon::yesterday()->toDateString())->get();
	}

	public function thisWeek(){
		$now = Carbon::now();
		$startDate = $now->startOfWeek()->toDateString();
		$endDate = $now->endOfWeek()->toDateString();

		return VisitorsCounter::whereBetween("created_at",[$startDate,$endDate])->get();

	}

	public function thisMonth(){
		return VisitorsCounter::whereMonth("created_at","=",date("m"))->get();

	}
}