<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function sendOTP(Request $request)
    {
        $number = $request->input('number');

        $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase.json');
        $auth = $factory->createAuth();
        $recaptchaVerifier = new \Kreait\Firebase\Auth\SignIn\RecaptchaVerifier($request->input('recaptchaToken'));

        $auth->signInWithPhoneNumber($number, $recaptchaVerifier)->confirm();

        return response()->json(['message' => 'OTP sent']);
    }
}
