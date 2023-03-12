<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;
use Hash;
use DB;



use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 

    public function deposite(Request $request)
    {  
        $acc_balance    = User::where("id", Auth::id())->orderby('id','DESC')->first();
        $old_balance    = Transaction::where("user_id", Auth::id())->skip(1)->take(1)->first();
       
        $request->validate([
            'credit' => 'required',
        ]);
         
            $deposite          = new Transaction();
            $deposite->user_id = Auth::id();
            $deposite->credit  = $request->credit;
            $deposite->balance = $acc_balance->account_balance + $request->credit;
            $deposite->save();

        if($old_balance != null)
        {
            $up_balance = $acc_balance->account_balance + $request->credit;
        }
        else{
            
            $up_balance = $acc_balance->account_balance + $request->credit;
        }
        $updated_balance = User::where("id", Auth::id())->update(['account_balance' => $up_balance]);
         
        return redirect("dashboard")->withSuccess('Cash deposited successfully');
    }

    public function withdraw(Request $request)
    {  
        $acc_balance    = User::where("id", Auth::id())->orderby('id','DESC')->first();
        $old_balance    = Transaction::where("user_id", Auth::id())->skip(1)->take(1)->first();
       
        $request->validate([
            'debit' => 'required',
        ]);
         
            $withdraw          = new Transaction();
            $withdraw->user_id = Auth::id();
            $withdraw->debit  = $request->debit;
            $withdraw->balance = $acc_balance->account_balance - $request->debit;
            $withdraw->save();

        if($old_balance != null)
        {
            $up_balance = $acc_balance->account_balance - $request->debit;
        }
        else{
            
            $up_balance = $acc_balance->account_balance - $request->debit;
        }
        $updated_balance = User::where("id", Auth::id())->update(['account_balance' => $up_balance]);
         
        return redirect("dashboard")->withSuccess('Cash Withdrawed successfully');
    }

    public function statement_list()
    {
         
        return view('statement');
    }

    public function statement(Request $request) 
    {
        
        
        if($request){

       
        $from       = $request->fromdate;
        $to         = $request->enddate;
        $startDate  = Carbon::createFromFormat('Y-m-d', $from);
        $endDate    = Carbon::createFromFormat('Y-m-d', $to);
       
        
        if($request->mode){

            if($request->mode == 0 ){

                    $statement  = Transaction::select('*')->whereNotNull('credit')->whereBetween('created_at', [$startDate, $endDate])->where("user_id", Auth::id())->get();
                }
            
            else
                {
                    $statement  = Transaction::select('*')->whereNotNull('debit')->whereBetween('created_at', [$startDate, $endDate])->where("user_id", Auth::id())->get();
                }

        }
        else{
            
           $statement  = Transaction::select('*')->whereBetween('created_at', [$startDate, $endDate])->where("user_id", Auth::id())->get();
        }

    }
         
       return view("statement")->with(['statement' => $statement,'startDate'=>$startDate,'endDate'=>$endDate]);
  

    }




    function fetch_data(Request $request)
    {

        $from       = $request->from_date;
        $to         = $request->to_date;
        $startDate  = Carbon::createFromFormat('Y-m-d', $from);
        $endDate    = Carbon::createFromFormat('Y-m-d', $to);
       
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
    $data  = Transaction::select('*')->whereBetween('created_at', array($startDate, $endDate))->where("user_id", Auth::id())->get();
    
      }
      else
      {
       $data = Transaction::orderBy('date', 'desc')->get();
      }
      echo json_encode($data);
     }
    }



}
