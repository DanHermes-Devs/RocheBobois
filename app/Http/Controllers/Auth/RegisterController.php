<?php

namespace App\Http\Controllers\Auth;

use Stripe\Stripe;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }
    public function index()
    {
        return view('auth.register');    
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pais' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'codigo_postal' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'codigo_postal' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo correo electr??nico es obligatorio',
            'codigo_postal.required' => 'El campo c??digo postal es obligatorio',
            'telefono.required' => 'El campo tel??fono es obligatorio',
            'telefono.integer' => 'El campo tel??fono debe ser un n??mero de tel??fono v??lido',
            'password.required' => 'El campo contrase??a es obligatorio',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'pais' => $request->pais,
            'estado' => $request->estado,
            'codigo_postal' => $request->codigo_postal,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
        ]);

        // Asignamos el rol de cliente al usuario
        $user->assignRole(2);

        // Registramos el usuario a stripe
        $user->createAsStripeCustomer();

        // Enviar correo de confirmaci??n de cuenta
        $user->sendEmailVerificationNotification();

        // Loguear al usuario
        Auth::login($user);

        // Redireccionar al usuario
        return redirect()->route('bienvenida');
    }
}
