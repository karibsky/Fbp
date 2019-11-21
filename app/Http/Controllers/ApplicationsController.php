<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Programmer;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationsController extends Controller
{
    public function send(Request $request) {

        $cb = $request['IDversion'];
        $regs = $request['regnumber'];

        $this->validate($request, [
            'name' => 'required|max:30',
            'lastname' => 'required|max:30',
            'patronymic' => 'required|max:30',
            'email' => 'required|max:30',
            'phone' => 'required|max:20',
            'password' => 'required|max:50'
        ]);

        $useremail = \App\User::where('email', $request['email'])->first();

        if($useremail) {
            return back()->withErrors('Пользователь с таким email уже существует')->withInput($request->all());
        }

        if ($cb == null) {
            return back()->withErrors('Выберите хотя бы один программный продукт')->withInput($request->all());
        }
        else {

            $idver = array();
            $regnumbers = array();

            for ($i = 0; $i < count($cb); $i++)
            {
                $idver['id'][$i] = $cb[$i];
                if ($regs[$i] != null)
                {
                    $regnumbers['regs'][$i] = $regs[$i];
                }
                else
                {
                    $regnumbers['regs'][$i] = '0';
                }
            }

            \App\User::create([
                'name' => $request['name'],
                'lastname' => $request['lastname'],
                'patronymic' =>$request['patronymic'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'organisation' => $request['organisation'],
                'IDversion' => serialize($idver),
                'regnumber' => serialize($regnumbers),
                'password' => Hash::make($request['password'])
            ]);

        }
        return back()->withErrors('Вы успешно зарегистрированы');
    }

    public function show(Request $request) {
        $currents = \App\Services::where('id', '=', $request->id)->get();
        return view('currentapplication', compact('currents'));
    }
}
