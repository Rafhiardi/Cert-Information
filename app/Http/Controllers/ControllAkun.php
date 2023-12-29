<?php

namespace App\Http\Controllers;

use App\Models\Cert\Userr;
use Illuminate\Http\Request;


class ControllAkun extends Controller
{
    //form admin
    public function DataAdmin()
    {
        $user = Userr::where('role', 'Admin')->paginate(5);
        //dd($user);
        return view("Cert/Akun/vAdmin", [
            'data' => $user,
        ]);
    }
    //form user
    public function DataUser()
    {
        $user = Userr::where('role', "User")->firstOrFail();
        return view("Cert/Akun/vUser", [
            "data" => $user,
        ]);
    }
    //proses CRUD
    public function AddDataAkun(Request $request)
    {
    }
    public function DeleteDataAkun(Request $request)
    {
    }
    public function EditDataAkun(Request $request)
    {
    }
    public function UpdateDataAkun(Request $request)
    {
    }
}
