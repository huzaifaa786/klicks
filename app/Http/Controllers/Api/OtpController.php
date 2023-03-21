<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Auth\SignInAnonymously;
use Kreait\Firebase\Auth\SignInWithIdpCredentials;
use Kreait\Firebase\Contract\Auth as ContractAuth;
use Kreait\Firebase\Factory;

class OtpController extends Controller
{
    // public function sendOTP(Request $request)
    // {

    //     $number = $request->input('number');

    //     $factory = (new Factory)->withServiceAccount(__DIR__.'/klicks-da38d-firebase-adminsdk-6lvbg-9fcd948194.json');
    //     $auth = $factory->createAuth();

    //     $phoneNumber = '+1234567890'; // replace with the phone number to send the OTP to
    //     $settings = new SignInAnonymously($phoneNumber);

    //     $auth->($phoneNumber, $settings);
    //     return response()->json(['message' => 'OTP sent']);
    // }
}
