<?php

namespace App\Http\Controllers\Lead;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Lead;
use App\LeadBid;
use Bican\Roles\Models\Role;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $lead = $user->lead;
        $leadBid = $user->leadBid;

        return view('lead.home', ['lead' => $lead, 'bids' => $leadBid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function addBid(Request $request, $id)
    {
        $this->validate($request, [
            'price' => 'required|numeric',
            'date_actual' => 'required|date:y-m-d',
            'description' => 'required|min:24',
            'unique_offer' => 'min:24'
        ]);

        LeadBid::create([
            'company_id' => $request->user()->company->id,
            'lead_id' => $id,
            'price' => $request->price,
            'description' => $request->description,
            'unique_offer' => $request->unique_offer,
            'date_actual' => $request->date_actual,
        ]);

        return redirect()->back()->with('success', 'Данные успешно сохранены!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        $leadBid = $lead->leadBid;

        return view('lead.home', ['lead' => $lead, 'bids' => $leadBid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
