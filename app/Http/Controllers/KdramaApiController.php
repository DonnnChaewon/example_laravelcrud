<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kdrama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KdramaApiController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = Kdrama::orderBy('title', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $dataKdrama = new Kdrama;

        $rules = [
            'title' => 'required',
            'production' => 'required',
            'episodes' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Fail to insert data',
                'data' => $validator->errors()
            ]);
        }

        $dataKdrama->title = $request->title;
        $dataKdrama->production = $request->production;
        $dataKdrama->episodes = $request->episodes;
        $dataKdrama->start = $request->start;
        $dataKdrama->end = $request->end;

        $post = $dataKdrama->save();

        return response()->json([
            'status' => true,
            'message' => 'Success to add data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $data = Kdrama::find($id);

        if($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $dataKdrama = Kdrama::find($id);

        if(empty($dataKdrama)) {
            return response() -> json([
                'status' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $rules = [
            'title' => 'required',
            'production' => 'required',
            'episodes' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Fail to update data',
                'data' => $validator->errors()
            ]);
        }

        $dataKdrama->title = $request->title;
        $dataKdrama->production = $request->production;
        $dataKdrama->episodes = $request->episodes;
        $dataKdrama->start = $request->start;
        $dataKdrama->end = $request->end;

        $post = $dataKdrama->save();

        return response()->json([
            'status' => true,
            'message' => 'Success to update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $dataKdrama = Kdrama::find($id);

        if (empty($dataKdrama)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $post = $dataKdrama->delete();

        return response()->json([
            'status' => true,
            'message' => 'Success to delete data'
        ]);
    }
}