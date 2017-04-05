<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Hash;
use App\User;
use App\Models\Customer;

class SystemController extends Controller
{
    function config()
    {
        $config = Config::find(1);
        return view('admin.system.config')->with('config',$config);
    }
    function config_update(Request $request)
    {
        $config = Config::find(1);
        $config->update($request->all());
        return redirect('admin/system/config')->with('notice','修改成功');
    }

    function password()
    {
        return view('admin.system.password');
    }
    function password_update(Request $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('alert', '原始密码错误~');
        }

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        $user->fill(['password' => bcrypt($request->password)])->save();

        return back()->with('notice', '修改成功~');
    }

    function member()
    {
        $customers = Customer::all();
        return view('admin.customer.index')
            ->with('customers',$customers);
    }

}
