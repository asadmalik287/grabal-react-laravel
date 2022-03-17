<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Validator;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }


    public function addReview(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'rating' => 'required',
            'review' => 'required',
        ]);

        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        $add_review = new Review();
        $add_review->service_id = $request->service_id;
        $add_review->rating = $request->rating;
        $add_review->review = $request->review;
        $add_review->save();

        return response()->json(['success' => true, 'message' =>'Review has been added successfully']);
        // if (Review::where(['service_id' => $request->service_id])->exists()) {
        //     $error = 'Review has been already added against this service';
        //     return (new ResponseController)->sendError(0, $error);
        // } else {
        //     try {
        //         $check = Review::create($request->all());
        //         if ($check) {
        //             $status = 1;
        //             $message = 'Review has been added against this service!';
        //             $result = Review::where('id', $check->id)->first();
        //             return (new ResponseController)->sendResponse($status, $message, $result);
        //         } else {
        //             $error = 'Error Occured while adding to Review!';
        //             return (new ResponseController)->sendError(0, $error);
        //         }
        //     } catch (\Exception$e) {
        //         $error = $e->getMessage();
        //         return (new ResponseController)->sendError(0, $error);
        //     }
        // }
    }



}



