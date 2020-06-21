<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\CompanySymbol;
use App\Rules\StartEndDate;
use App\Rules\EndDate;
use App\Rules\StartDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SymbolHistory;

class XmFormController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_symbol' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $this->validate($request, ['end_date' => new StartEndDate($request)]);
        //do validation for start and end seperatelly, to get error message at right place
        //in form
        $this->validate($request, ['start_date' => new StartDate]);
        $this->validate($request, ['end_date' => new EndDate]);
        $this->validate($request, ['company_symbol' => new CompanySymbol]);

        
        $symHistory = new SymbolHistory($request->company_symbol, $request->start_date, $request->end_date);
        $xmform_data = json_decode($symHistory->getData());
        return view('symbol_history', ['xmform' => $xmform_data]);
    }
}
