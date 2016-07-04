<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Auth;
use Validator;
use Image;

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
        return view('company.settings', ['user' => Auth::user()]);
    }

    public function updateGeneral(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            if (!is_dir( public_path('uploads/' . $user->id) )) {
                File::makeDirectory($path=base_path('public/uploads/' . $user->id), $mode = 0755, $recursive = true, $force = false);
            }

            $makeImg = Image::make($avatar)->resize(300, 300)->save( public_path('uploads/' . $user->id . '/' . $filename ) );

            if ($makeImg) {
                if (!$request->has('name')) {
                    $user->company->avatar = $filename;
                    $user->company->save();

                    return redirect('/settings')->with('success', 'Данные успешно сохранены!');
                }

                $user->company->avatar = $filename;
                $user->company->name = $request->name;
                $user->company->save();

                return redirect('/settings')->with('success', 'Данные успешно сохранены!');
            }
        }

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $user->company->name = $request->name;
        $user->company->save();

        return redirect('/settings')->with('success', 'Данные успешно сохранены!');
    }
}
