<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Domaine;


class AuthController extends Controller
{
    public function inscription()
    {
        $domaines = Domaine::all();
        return view('auth.inscription', compact('domaines'));
    }
    public function registerUser(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'address' => 'nullable|string|max:255',
        'role' => 'nullable|string|in:user,admin,expert',
        'phone' => 'nullable|string|max:20',
        'domaine_id' => 'required|exists:domaines,id',
    ]);

    // Create user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'address' => $request->address,
        'role' => $request->role ?? 'user',
        'phone' => $request->phone,
        'domaine_id' => $request->domaine_id, // Fixed: use '=>' instead of '='
    ]);

    if ($user) {
        // Store user ID in session and redirect to dashboard
         // Log the user in
         Auth::login($user);
         switch ($user->role) {
            case 'user':
                return redirect()->route('front.home');
            case 'expert':
                return redirect()->route('expert');
            case 'admin':
                return redirect()->route('dashboard');
            default:
                return redirect()->route('front.home');
        }
    }

    // Redirect to login page with a success message
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
                return redirect()->route('expert');
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
        Auth::logout();
            return redirect('login');
        
    }
}
