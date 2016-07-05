<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Lead;
use App\Category;
use Validator;
use Auth;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Bican\Roles\Models\Role;

class AuthLeadController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/lead-register';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function showRegistrationForm()
    {
        $categories = Category::all();

        return view('auth.lead-register', ['categories' => $categories]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->create($request->all());

        $this->emailSend($request->all());

        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:48',
            'email' => 'required|email|max:255|unique:users',
            'category' => 'required|max:48',
            'lead_name' => 'required|max:24',
            'price' => 'required|numeric',
            'date_actual' => 'required|date:y-m-d',
            'description' => 'required|min:24'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
        ]);

        $leadRole = Role::where('slug', 'lead')->first();

        $user->attachRole($leadRole);

        Lead::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'category' => $data['category'],
            'lead_name' => $data['lead_name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'date_actual' => $data['date_actual'],
        ]);

        return $user;
    }

    protected function emailSend(array $data)
    {
        $title = "Поздравляем с успешной регистрацией";
        $name = $data['name'];
        $email = $data['email'];
        $content = $name." спасибо за регистрацию.";

        return Mail::later(5, 'emails.register', ['title' => $title, 'content' => $content, 'email' => $email], function ($message) use ($email)
        {
            $message->from('flancyk.flancyk@yandex.ru', 'Трифонов Кирилл');

            $message->to($email)->subject('Регистрация!');
        });
    }
}
