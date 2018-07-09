<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Prize\StorePrizeReqest;
use App\Http\Requests\Prize\UpdatePrizeReqest;
use App\User;
use Auth;
use App\MainPrize;
// use Illuminate\Support\Facades\Storage;

class PrizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $prize = MainPrize::all();
      $total = MainPrize::getTotalQty();
      $totalPerMnth = MainPrize::getTotalMnthQty();
      $data['prizes'] = $prize;
      $data['total'] = $total;
      $data['totalMonth'] = $totalPerMnth;
      return view('prize.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prize.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrizeReqest $request)
    {
        $requestData = $request->all();
        MainPrize::create($requestData);
        return redirect('prize')->with('flash_message', 'Prize added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['prize'] = MainPrize::findOrFail($id);
        return view('prize.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['prize'] = MainPrize::findOrFail($id);
        $data['submitButtonText'] = 'Update';
        return view('prize.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrizeReqest $request, $id)
    {
        $requestData = $request->all();
        $prize = MainPrize::findOrFail($id);
        $prize->update($requestData);

        return redirect('prize')->with('flash_message', 'Main Prize has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MainPrize::destroy($id);
        return redirect('prize')->with('flash_message', 'Prize has been deleted!');
    }
}
