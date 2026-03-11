<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index() {
        $user = request()->user();
        $logs = DB::table('users_audit')
            ->select('audit_id', 'activitylogs', 'action', 'created_at')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($logs);
    }
}
