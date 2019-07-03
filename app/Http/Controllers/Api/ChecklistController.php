<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Checklist;

class ChecklistController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();

        return response([
            $user->checklists()->paginate(5),

        ], 200);
    }

    public function store(Request $request) {
        $user = $request->user();

        if ($user->checklists()->create([
            'checklist_id' => $user->id,
            'title' => $request->title,
        ])) {
            return response()->json('Create checklist');
        }
        else {
            return response('Error', 500);
        }
    }

    public function destroy(Request $request) {
        $user = $request->user();

        if ($user->checklists()->find($request->checklist_id)->delete()) {
            return response()->json('Delete checklist');
        }
        else {
            return response('Error', 500);
        }
    }
}
