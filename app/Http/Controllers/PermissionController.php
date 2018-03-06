<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->paginate();
        return view('permissions/index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([            
            'name' => 'required|max:255|alphadash|unique:permissions,name',
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255'
        ]);
        
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        
        return redirect()->route('permissions.index')
    		->with('status','Permission saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.show')->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateWith([
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        
        return redirect()->route('permissions.show', $id)
    		->with('status','Updated the '. $permission->display_name . ' permission.');
    }
}
