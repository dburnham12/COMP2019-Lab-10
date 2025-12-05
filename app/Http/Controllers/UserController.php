<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     //Register user
    public function register(Request $request) { 
        // Stack Overflow article on how to catch query exceptions in php
        // https://stackoverflow.com/questions/33679996/how-do-i-catch-a-query-exception-in-laravel-to-see-if-it-fails
        // Used to implement try and catch block that will handle errors if the operation fails 
        try{
            $incomingData = $request->validate([
                "name" => ["required", "string", "max:255"],
                "email" => ["required", "string"],
                "password" => ["required", "string", "min:3"]
            ]);
            $incomingData["password"] = bcrypt($incomingData["password"]);
            $user = User::create($incomingData);
        } catch(Exception $e) {
            // PHP manual for exceptions
            // https://www.php.net/manual/en/language.exceptions.php
            // Used to find out that the getCode function exists allowing me to narrow down
            // the exception to at least be of a specific type, if it is of that specific 
            // type (integrity constraint violation) assume that the email is the cuplrit
            // as all other fields do not need to be unique
            if($e->getCode() == 23000)
                return redirect("/register")->withErrors([
                    "registerError" => "Cannot Register User (Email may already be in use)",
                ]);
            
            return redirect("/register")->withErrors([
                "registerError" => $e->getMessage(),
            ]);
        }
        return redirect("/");
    }

    // Login user
    public function login(Request $request) {
        $credentials = $request->validate([
            "loginName" => ["required", "string"],
            "loginPassword" => ["required", "string"]
        ]);
        if(auth()->attempt([
            "name" => $credentials["loginName"],
            "password" => $credentials["loginPassword"]
        ])) {
            $request->session()->regenerate();
            return redirect("/page1");
        }
        return redirect("/")->withErrors([
            "loginError" => "Incorrect username and password"
        ]);
    }

    // Logou user
    public function logout(Request $request) {
        auth()->logout();
        return redirect("/");
    }
}
