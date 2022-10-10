<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Imports\CustomerImport;
use Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        return view('index', ['customers' => $customers]);
    }

    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        Excel::import(new CustomerImport, $request->file);
        return back()->withStatus("Kayıtlar başarılı bir şekilde yükledi.");
    }
}
