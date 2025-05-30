<?php

namespace App\Http\Controllers;

use App\Services\SMPPService;
use Illuminate\Http\Request;

class SMPPController extends Controller
{
    protected $smppService;

    public function __construct(SMPPService $smppService)
    {
        $this->smppService = $smppService;
    }

    public function sendSms(Request $request)
    {
        $to = $request->input('to');
        $message = $request->input('message');
        try {
            $this->smppService->sendSMS($to, $message);
            return response()->json(['status' => 'success', 'message' => 'SMS sent successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
