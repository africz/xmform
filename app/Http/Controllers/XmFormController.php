<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\CompanySymbol;
use App\Rules\StartEndDate;
use App\Rules\EndDate;
use App\Rules\StartDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Mail\Mailer;
use App\SymbolHistory;
use App\Mail\XmFormData;
use Illuminate\Support\Facades\Mail;

class XmFormController extends Controller
{

    public function create()
    {
        return view('xmform');
    }

    public function send_mail($request,$xmform_data)
    {
        $subject = $request->company_symbol;
        //not finished yet, need to prepare template , sending okay if smtp or other sending methods are set
        //Mail::to($request->email)->send(new XmFormData($xmform_data,$subject));
    }



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
        $this->send_mail($request,$xmform_data);
       // dd($xmform_data);
        $header_data=array('start_date'=>$request->start_date,'end_date'=>$request->end_date,'symbol'=>$request->company_symbol);
        return view('symbol_history', ['xmbody' => $xmform_data,'xmheader' => $header_data]);
    }
}
