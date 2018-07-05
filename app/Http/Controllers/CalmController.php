<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Calm;
use Illuminate\Support\Facades\Storage;

class CalmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $calm = Calm::all();
      $data['calms'] = $calm;
      return view('calm.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('calm.create');
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
        // Handle File Upload
        if($request->hasFile('process_image')){
            $filenameWithExt = $request->file('process_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('process_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('process_image')->storeAs('public/process_image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $requestData['process_image'] = $fileNameToStore;
        Calm::create($requestData);
        return redirect('calm')->with('flash_message', 'Post added!');
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
        $data['calm'] = Calm::findOrFail($id);
        $data['process_image'] = Storage::disk('calm')->get($data['calm']->process_image);
        return view('calm.show', $data);
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
        $data['calm'] = Calm::findOrFail($id);
        $data['submitButtonText'] = 'Update';
        return view('calm.edit', $data);
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
        $calm = Calm::findOrFail($id);

        if($request->hasFile('process_image')){
            $filenameWithExt = $request->file('process_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('process_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('process_image')->storeAs('public/process_image', $fileNameToStore);
            $requestData['process_image'] = $fileNameToStore;
            $exists = Storage::disk('calm')->exists($calm->process_image);
            if($exists){
              Storage::disk('calm')->delete($calm->process_image);
            }
        }

        $calm->update($requestData);

        return redirect('calm')->with('flash_message', 'Post updated!');
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
        Calm::destroy($id);
        return redirect('calm')->with('flash_message', 'Post deleted!');
    }
}
