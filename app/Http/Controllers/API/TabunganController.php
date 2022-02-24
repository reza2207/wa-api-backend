<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\UserTabungan;

class TabunganController extends Controller
{
    //

    public function index()
    {

    }

    public function get_user()
    {
        $user = UserTabungan::all();

        return response()->json([
            'message' => 'success',
            'data' => $user
        ], 200);
    }

    public function add_user(Request $request)
    {
        $this->validate($request, [
			'id_user'=> 'required',
            'status'=> 1,

		]);

		Usertabungan::create([
            'id_user' => $request->id_user,
            'status' => $request->status,
		]);
        return response()->json([
            'message' => 'user berhasil ditambahkan',
            'data' => 'success',
        ], 200);
    }

    public function nabung(Request $request)
    {
        $this->validate($request, [
			'id_user'=> 'required',
            'nominal'=> 'required|int'

		]);

		Usertabungan::create([
            'id_user' => $request->id_user,
            'status' => $request->status,
		]);
        return response()->json([
            'message' => 'user berhasil ditambahkan',
            'data' => 'success',
        ], 200);
    }


}
