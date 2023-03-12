<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use App\Models\Transaction;
use Hash;
use DB;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("/")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'place' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect('dashboard')->withSuccess('Great! You have Successfully logged In');
           
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
      
        if(Auth::check()){
            
            $users          = User::all();
            $acc_balance    = User::where("id", Auth::id())->orderby('id','DESC')->first();
            return view('dashboard')->with(['users'=>$users,'acc_balance'=>$acc_balance])->with('no', 1);
        }
  
        return redirect("/")->withSuccess('Account Created Successfully');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'place' => $data['place'],
        'email' => $data['email'],
        'account_balance' => $data['account_balance'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

    
}