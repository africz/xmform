<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\CompanySymbol;
use App\Rules\StartDate;
use App\Rules\EndDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class XmFormController extends Controller
{

    protected $validationRules = [
        'company_symbol' => 'required|unique|max:255',
        'start_date' => 'required',
    ];
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        $this->validate($request, ['company_symbol' => new CompanySymbol]);
        $this->validate($request, ['start_date' => new StartDate]);
        $this->validate($request, ['end_date' => new EndDate]);

         if ($validator->fails()) {
             return redirect('/')
                         ->withErrors($validator)
                         ->withInput();
         }    

    
        // $data = $request->validate([
        //     'company_symbol' => 'required|max:255',
        //     'start_date' => 'required|date|max:255',
        //     'end_date' => 'required|date|max:255',
        //     'email' => 'required|date|max:255',
        // ]);
    }
}
