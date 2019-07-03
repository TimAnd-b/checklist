<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListitemController extends Controller
{
    public function index($id, Request $request) {
        $user = $request->user();

        return response([
            $user->checklists()->find($id)->list_items()->paginate(5),

        ], 200);
    }

    public function store($id, Request $request) {
        $user = $request->user();

        if ($user->checklists()->find($id)->list_items()->create([
            'checklist_id' => $id,
            'body' => $request->body,
        ])) {
            return response()->json('Create list_item');
        }
        else {
            return response('Error', 500);
        }
    }

    public function destroy($id, $list_id, Request $request) {
        $user = $request->user();

        if ($user->checklists()->find($id)->list_items()->find($list_id)->delete()) {
            return response()->json('Delete list_item');
        }
        else {
            return response('Error', 500);
        }
    }

    public function update($id, $list_id, Request $request) {
        $user = $request->user();

        if ($item = $user->checklists()->find($id)->list_items()->find($list_id)) {
            if ($item->done == 1)
                $item->done = 0;
            else
                $item->done = 1;
            $item->save();
            return response()->json($item->done);
        }
        else {
            return response('Error', 500);
        }
    }
}
