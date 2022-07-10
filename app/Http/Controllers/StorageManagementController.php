<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StorageManagement;

class StorageManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:storage-list|storage-create|storage-edit|storage-delete', ['only' => ['index','show']]);
        $this->middleware('permission:storage-create', ['only' => ['create','store']]);
        $this->middleware('permission:storage-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:storage-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $storages = StorageManagement::latest()->paginate(5);
        return view('storage.index',compact('storages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('storage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        StorageManagement::create($request->all());
    
        return redirect()->route('storage.index')
                        ->with('success','storage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StorageManagement $storage)
    {
        return view('storage.show',compact('storage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StorageManagement $storage)
    {
        return view('storage.edit',compact('storage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StorageManagement $storage)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $storage->update($request->all());
    
        return redirect()->route('storage.index')
                        ->with('success','storage updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StorageManagement $storage)
    {
        $storage->delete();
    
        return redirect()->route('storage.index')
                        ->with('success','storage deleted successfully');
    }
}
