<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\CompanySymbol;
use App\Rules\StartEndDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SymbolHistory;

class XmFormController extends Controller
{

    // protected $validationRules = [
    //     'company_symbol' => 'required|unique|max:255',
    //     'start_date' => 'required',
    // ];



    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_symbol' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'email' => 'required|email',
        ]);


        $this->validate($request, ['start_date' => new StartEndDate($request)]);
        $this->validate($request, ['company_symbol' => new CompanySymbol]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $symHistory = new SymbolHistory($request->company_symbol, $request->start_date, $request->end_date);
        $xmform_data = json_decode($symHistory->getData());
        return view('symbol_history', ['xmform' => $xmform_data]);
    }
}
