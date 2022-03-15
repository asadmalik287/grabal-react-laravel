<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WatchList;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
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
}
