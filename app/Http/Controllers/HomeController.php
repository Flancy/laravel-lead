<?php

namespace App\Http\Controllers;

use App\Company;
use App\Lead;
use App\PayLead;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Bican\Roles\Models\Role;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('welcome');
        } else {
            $user = Auth::user();

            if ($user->is('company')) {
                $leads = Lead::all();

                return view('home', ['leads' => $leads]);
            } elseif ($user->is('lead')) {
                return redirect()->action('Lead\HomeController@index');
            }
        }
    }

    public function buyLead($id)
    {
        $lead = Lead::findOrFail($id);

        $payLead = PayLead::create([
            'company_id' => Auth::user()->company->id,
            'lead_id' => $lead->id,
            'buy' => 1,
        ]);

        return redirect()->back();
    }
}
