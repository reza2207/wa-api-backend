<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\RezamindEmail;
use App\Models\UserTabungan as ModelsUserTabungan;
use Illuminate\Support\Facades\Mail;
use App\Models\UserTabungan;

class TabunganController extends Controller
{
    //
    public $title = "Tabungan";

    public function index()
    {
        $data['title'] = $this->title;

        return view('tabungan', $data);
    }

    public function api_get_user()
    {
        $user = UserTabungan::all();

        return response()->json([
            'message' => 'success',
            'data' => $user
        ], 200);
    }

    public function sendEmail()
    {
        Mail::to("reza.220793@gmail.com")->send(new RezamindEmail());

		return "Email telah dikirim";
    }
}
