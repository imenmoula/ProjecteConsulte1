<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function inscription()
    {
        return view('auth.inscription');
    }

    public function registerUser(Request $request)
    {
       $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'address' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'in:user,admin,expert'],
            'phone' => ['nullable', 'string', 'max:20'],
            'specialty' => ['nullable', 'string', 'max:100'],
       ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'role' => $request->role ?? 'user',
            'phone' => $request->phone,
            'specialty' => $request->specialty,
        ]);

        if ($user) {
            $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
           
        }

        return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
    }

    // Login
    public function login()
    {
        return view('auth.login');
    }
    public function loginUser(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8|max:12',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);

        switch ($user->role) {
            case 'user':
                return redirect()->route('front.home');
            case 'expert':
                return redirect()->route('Expert.interface');
            case 'admin':
                return redirect()->route('dashboard');
            default:
                return redirect()->route('front.home');
        }
    } else {
        return back()->with('fail', 'Email or password incorrect.');
    }
}

    // Dashboard
    public function dashboard()
    {
        $data = [];
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('auth.user', compact('data'));
    }

    // Logout
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
