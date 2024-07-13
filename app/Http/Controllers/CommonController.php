<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CommonController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'full_name'      => 'required|string|max:50|min:3',
                'email'          => 'required|email|max:50',
                'subject'        => 'required|string|max:128',
                'message'        => 'nullable|string',
                'captcha_answer' => 'required|string',
                'captcha_key'    => 'required|string',
            ]);

            Contact::create([
                'full_name'     => $validatedData['full_name'],
                'email'         => $validatedData['email'],
                'subject'       => $validatedData['subject'],
                'message'       => $validatedData['message'],
                'ip_address'    => $request->ip(),
                'user_agent'    => $request->header('User-Agent'),
                'device_type'   => $this->getDeviceType($request),
                'browser_type'  => $this->getBrowserType($request),
                'os_type'       => $this->getOsType($request)
            ]);

            return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
        }
        $captcha = $this->generateCaptcha();
        return view('pages.contact', compact('captcha'));
    }

    private function getDeviceType(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        if (strpos($userAgent, 'Mobile') !== false) {
            return 'Mobile';
        } elseif (strpos($userAgent, 'Tablet') !== false) {
            return 'Tablet';
        } else {
            return 'Desktop';
        }
    }

    private function getBrowserType(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        if (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Edge') !== false) {
            return 'Edge';
        } else {
            return 'Other';
        }
    }

    private function getOsType(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        if (strpos($userAgent, 'Windows') !== false) {
            return 'Windows';
        } elseif (strpos($userAgent, 'Macintosh') !== false) {
            return 'Mac';
        } elseif (strpos($userAgent, 'Linux') !== false) {
            return 'Linux';
        } elseif (strpos($userAgent, 'Android') !== false) {
            return 'Android';
        } elseif (strpos($userAgent, 'iPhone') !== false) {
            return 'iPhone';
        } else {
            return 'Other';
        }
    }

    private function generateCaptcha()
    {
        $firstNumber = rand(1, 9);
        $secondNumber = rand(1, 9);
        $key = uniqid();

        $question = "What is $firstNumber + $secondNumber?";
        $answer = $firstNumber + $secondNumber;

        Session::put('captcha.'.$key, $answer);

        return [
            'question' => $question,
            'key' => $key,
            'fake' => $answer,
        ];
    }
}
