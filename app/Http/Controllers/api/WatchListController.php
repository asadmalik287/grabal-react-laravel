<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WatchList;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
    // add service to watchlist after checking if already exists
    public function addToWatchlist(Request $request)
    {
        if (WatchList::where(['user_id' => $request->user_id, 'service_id' => $request->service_id])->exists()) {
            $error = 'Service has been already added in Watchlist';
            return (new ResponseController)->sendError(0, $error);
        } else {
            try {
                $check = WatchList::create($request->all());
                if ($check) {
                    $status = 1;
                    $message = 'Service has been added to Wathclist!';
                    $result = WatchList::where('id', $check->id)->first();
                    return (new ResponseController)->sendResponse($status, $message, $result);
                } else {
                    $error = 'Error Occured while adding to Wathclist!';
                    return (new ResponseController)->sendError(0, $error);
                }
            } catch (\Exception$e) {
                $error = $e->getMessage();
                return (new ResponseController)->sendError(0, $error);
            }
        }
    }
    //close

    // get services from watchlist
    public function getWatchList(Request $request)
    {
        $arr = [];
        $getWatchList = WatchList::where('user_id', $request->user_id)->distinct()->get('service_id');
        if (count($getWatchList) > 0) {
            foreach ($getWatchList as $service) {
                array_push($arr, $service->service_id);
            }
            // return count($arr);
            $status = 1;
            $message = 'Services has been retrieved!';
            return (new ResponseController)->sendResponse($status, $message, $arr);
        } else {
            $error = 'No Service Found in Watch List';
            return (new ResponseController)->sendError(0, $error);
        }
    }

    //close
}
