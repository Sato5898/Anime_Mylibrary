<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomersController extends Controller
{   
    /*一覧表示(cusotmer.blade.php)*/ 
    public function form() {
        $customer = new Customer;
        $customers = $customer->select();
        return view('customer', compact('customers'));
    }

    /*編集画面(入力)*/ 
    public function edit_index($id){
        $customer = Customer::findOrFail($id);
        return view('edit_index')->with('customer', $customer);
    }

 
    /*更新*/ 
    public function update(Request $request, $id){
        $user = Customer::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        $user->save();
        return redirect('customer')->with('status','更新完了いたしました');
    }

    /*削除*/
    public function delete($id){
        $user = Customer::find($id);
        $user->delete();
        return redirect('customer')->with('flash_msg', '削除が完了いたしました');
    }
}
