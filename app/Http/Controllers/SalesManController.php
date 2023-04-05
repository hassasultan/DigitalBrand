<?php

namespace App\Http\Controllers;

use App\Models\SaleMan;
use App\Models\User;
use App\Traits\SaveImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalesManController extends Controller
{
    //
    use SaveImage;
    public function index()
    {
        $salesman = SaleMan::all();
        return view('admin.pages.salesman.index',compact('salesman'));
    }
    public function create()
    {
        // $salesman = SaleMan::all();
        return view('admin.pages.salesman.create');
    }
    public function store(Request $request)
    {
        $user = User::create([
            "name" => $request->first_name." ".$request->last_name,
            "email" => $request->email,
            "role" => 4,
            "password" => Hash::make("12345678"),
        ]);
        $sales_man = new SaleMan();
        $sales_man->user_id = $user->id;
        if($request->has('phone') && $request->phone)
        {
            $sales_man->phone = $request->phone;

        }
        if($request->has('qualification') && $request->qualification)
        {
            $sales_man->qualification = $request->qualification;

        }
        if($request->has('cnic') && $request->cnic)
        {
            $sales_man->cnic = $request->cnic;

        }
        if($request->has('marital_status') && $request->marital_status)
        {
            $sales_man->marital_status = $request->marital_status;

        }
        if($request->has('religion') && $request->religion)
        {
            $sales_man->religion = $request->religion;

        }
        if($request->has('bank_account') && $request->bank_account)
        {
            $sales_man->bank_account = $request->bank_account;

        }
        if($request->has('age') && $request->age)
        {
            $sales_man->age = $request->age;

        }
        if($request->has('address') && $request->address)
        {
            $sales_man->address = $request->address;

        }
        if($request->has('cnic_image') && $request->cnic_image)
        {
            $sales_man->cnic_image = $this->cnic_image($request->cnic_image);
        }
        if($request->has('work_history') && $request->work_history)
        {
            $sales_man->work_history = $this->work_history($request->work_history);
        }
        if($request->has('picture') && $request->picture)
        {
            $sales_man->picture = $this->picture($request->picture);
        }
        $sales_man->save();
        return redirect()->route('salesman-management.index');
    }
}
