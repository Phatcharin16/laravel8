<?php

use App\Models\LeaveRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//file: routes/api.php
Route::get("product", function () {
    $products = Product::limit(5)->orderBy('price', 'desc')->get();
    return $products;
});

Route::get('user', function () {
    $users = User::select('id', 'name', 'email')
        ->withCount('userLeaveRequests')
        ->get();
    return $users;
});

Route::get("leave-request-summary-status", function () {
    $data = LeaveRequest::selectRaw('status, count(status) as total')
        ->groupBy('status')
        ->get();
    return $data;
});

Route::get("leave-request-summary-month/{year}", function ($year) {
    $data = LeaveRequest::selectRaw("month(start_date) as m, count(month(start_date)) as total")
        ->whereYear('start_date', $year)
        ->groupBy('m')
        ->get();
    return $data;
});


Route::get("leave-request-summary-type", function () {
    $data = LeaveRequest::selectRaw('leave_type_name, count(leave_type_name) as total')
        ->groupBy('leave_type_name')
        ->get();
    return $data;
});

Route::get("leave-request-summary-type/user/{user_id}", function ($user_id) {
    $user = User::findOrFail($user_id);
    $users = User::get();
    $leave_requests = LeaveRequest::selectRaw('leave_requests.leave_type_name, count(leave_requests.leave_type_name) as total, max_leave_per_year')
        ->join('leave_types', 'leave_types.leave_type_name', '=', 'leave_requests.leave_type_name')
        ->where('user_id', $user_id)
        ->groupBy('leave_type_name', 'max_leave_per_year')
        ->get();
    $data = [
        "user" => $user,
        "users_length" => count($users),
        "leave_requests" => $leave_requests,
    ];
    return $data;
});
