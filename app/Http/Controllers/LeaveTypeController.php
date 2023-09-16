<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $leavetype = LeaveType::where('leave_type_name', 'LIKE', "%$keyword%")
                ->orWhere('max_leave_per_year', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $leavetype = LeaveType::latest()->paginate($perPage);
        }

        return view('leave-type.index', compact('leavetype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('leave-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        LeaveType::create($requestData);

        return redirect('leave-type')->with('flash_message', 'LeaveType added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $leavetype = LeaveType::findOrFail($id);

        return view('leave-type.show', compact('leavetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $leavetype = LeaveType::findOrFail($id);

        return view('leave-type.edit', compact('leavetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $leavetype = LeaveType::findOrFail($id);
        $leavetype->update($requestData);

        return redirect('leave-type')->with('flash_message', 'LeaveType updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        LeaveType::destroy($id);

        return redirect('leave-type')->with('flash_message', 'LeaveType deleted!');
    }
}
