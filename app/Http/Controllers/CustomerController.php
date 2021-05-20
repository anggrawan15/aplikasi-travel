<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('customers.home');
    }


    public function loginForm(){
        if (auth()->guard('customer')->check()) return redirect(route('customer.home'));
        
        return view('customers.auth.login-customer');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
        ]);

        $auth = $request->only('email', 'password');
        $auth['status'] = 1;

        if (auth()->guard('customer')->attempt($auth)){

            return redirect()->intended(route('customer.home'));
        }
        return redirect()->back()->with(['error' => 'Email / Password Salah']);
    }

    public function logout(){
        auth()->guard('customer')->logout(); //JADI KITA LOGOUT SESSION DARI GUARD CUSTOMER
        return redirect(route('customer.loginForm'));
    }

    public function registerForm(){
        return view('customers.auth.register-customer');
    }

    public function register(Request $request){
        $this->validate($request, [
            'nama' =>'required|string|max:50',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:20',
            'password2' => 'required|string|min:8|max:20',
            'no_tlp' => 'required',
            'alamat' => 'required',
            
        ]);

        try{

            
            $customer = Customer::where('email', $request->email)->first();

            if($request->password == $request->password2){
                
                $customer = Customer::create([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' =>$request->password,
                    'no_tlp' => $request->no_tlp,
                    'alamat' => $request->alamat,
                    'status' => true,
                ]);
                
                return redirect(route('customer.loginForm'))->with(['success' => 'Register Success, Silahkan Login!']);
            }  
            
            return redirect()->back()->with(['error' => 'Password tidak Sama!']);

        }catch (\Exception $e) {

            return redirect()->back()->with(['error' => 'Email Yang Didaftarkan Sudah Ada! ' ]);

        }    

    }



    
    
}
