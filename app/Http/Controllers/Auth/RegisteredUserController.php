<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
// BỔ SUNG 2 THƯ VIỆN NÀY ĐỂ GỬI MAIL
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeRegisteredUserMail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        event(new Registered($user));

        // ==========================================
        // 2. PHÁT LỆNH GỬI MAIL CHÀO MỪNG
        // Do WelcomeRegisteredUserMail có implements ShouldQueue,
        // hàm send() tự động chuyển thành queue(), đẩy vào DB chứ không làm treo Web.
        // ==========================================
        Mail::to($user->email)->send(new WelcomeRegisteredUserMail($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
