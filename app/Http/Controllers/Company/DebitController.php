<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Debit;

class DebitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('company.debit', ['user' => Auth::user()]);
    }

    public function addMoney(Request $request)
    {
        $this->validate($request, [
            'money' => 'required|numeric',
        ]);

        $request->user()->debit->debit = $request->money;
        $request->user()->debit->save();

        return redirect('/debit')->with('success', 'Данные успешно сохранены!');
    }
}
