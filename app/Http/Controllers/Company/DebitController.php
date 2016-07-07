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

    public function getMoney(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        return response()->json([
            'debit' => Auth::user()->debit->debit
        ]);
    }

    public function addMoney(Request $request)
    {
        $this->validate($request, [
            'money' => 'required|numeric',
        ]);

        $userMoney = $request->user()->debit->debit;

        $request->user()->debit->debit = $userMoney + $request->money;
        $request->user()->debit->save();

        if (!$request->ajax()) {
            return redirect('/debit')->with('success', 'Деньги успешно зачислены!');
        }

        return response()->json([
            'success' => 'Данные успешно сохранены!'
        ]);
    }
}
