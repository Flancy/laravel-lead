<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class SettingController extends Controller
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
        return view('company.settings');
    }

    public function updateGeneral(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        Auth::user()->company->fill($request->all());
        Auth::user()->push();

        return redirect('/settings')->with('success', 'Данные успешно сохранены!');
    }
}
