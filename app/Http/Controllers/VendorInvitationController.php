<?php

namespace App\Http\Controllers;

use App\Models\VendorInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendorInvitationController extends Controller
{
    public function index()
    {
        $vendorInvitations = VendorInvitation::orderBy('id', 'DESC')->paginate(6);
        return view('vendor.invite', compact('vendorInvitations'));
    }

    public function sendEmail(Request $request)
    {

        $request->validate([
            'email.*' => 'required|email|unique:vendor_invitations,email',
        ]);

        foreach ($request->email as $email) {
            // dd($email);
            Mail::send('mail', [], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Registerion invitation');
            });
            $vendorInvitation = new VendorInvitation();
            $vendorInvitation->email = $email;
            $vendorInvitation->status = 0;
            $vendorInvitation->save();
        }

        return back()->with('success', 'Invitation send successfully');
    }

    public function reSendEmail(VendorInvitation $vendorInvitation)
    {
        // dd($vendorInvitation);
        $resend_mail = $vendorInvitation->email;
        Mail::send('mail', [], function ($message) use ($resend_mail) {
            $message->to($resend_mail);
            $message->subject('Registerion invitation');
        });

        return back()->with('success', 'Invitation send successfully');
    }

    public function delete(VendorInvitation $vendorInvitation){
        // dd($vendorInvitation);
        $vendorInvitation->forceDelete();
        return back()->with('success', 'Invitation Deleted successfully');
    }
}
