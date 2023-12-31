<?php

namespace App\Http\Controllers;

use App\Models\Cert\Userr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Userr::where('role', 'User')->paginate(5);
        //dd($user);
        return view("Cert/Akun/vUser", [
            'data' => $user,
        ]);
    }
    public function BuatAkun($role)
    {
        if ($role == 'Admin') {
            return view('Cert/Akun/Admin');
        } else {
            return view('Cert/Akun/User');
        }
    }
    public function EditAkun(request $request, $id)
    {
        $user = Userr::where('id', $id)->firstOrFail();
        return view('Cert/Akun/EditAdmin', [
            'data' => $user,
        ]);
    }

    public function EditAkunUser(request $request, $id)
    {
        $user = Userr::where('id', $id)->firstOrFail();
        return view('Cert/Akun/EditUser', [
            'data' => $user,
        ]);
    }
    //proses CRUD
    public function AddDataAkun(Request $request)
    {


        $data = new Userr;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role = $request->role;

        if (!$data->where('email', $request->email)->exists()) {

            $data->save();
        } else {
            return redirect(404);
        }
        if ($request->role == 'Admin') {
            return redirect()->route("akun/admin")->with("success", "Akun Berhasil dibuat");
        } else {
            return redirect()->route("vUser")->with("Success", "akun user berhasil di buat");
        }
    }
    public function DeleteDataAkun(Request $request, $id)
    {

        $data = Userr::where('id', $id)->firstOrFail();
        if ($data->role == 'Admin') {
            $data->delete();
            return redirect('vAdmin');
        } else {
            $data->delete();
            return redirect('vUser');
        }
    }
    public function UpdateDataAkun(Request $request, $id)
    {
        $pass = $request->password;

        if ($pass == Null) {
            $data = Userr::where('id', $id)->firstOrFail();
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->update();
        } else {
            $data = Userr::where('id', $id)->firstOrFail();
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->update();
        }
        return redirect('/vAdmin');
    }
    public function UpdateDataUser(Request $request, $id)
    {
        $pass = $request->password;

        if ($pass == Null) {
            $data = Userr::where('id', $id)->firstOrFail();
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->update();
        } else {
            $data = Userr::where('id', $id)->firstOrFail();
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->update();
        }
        return redirect('/vUser');
    }
}
