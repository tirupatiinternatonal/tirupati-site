<?php    

namespace App\Http\Controllers\Admin;    

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Employee;
use App\Models\EnquiryDetail;
use App\Models\Invoice;
use App\Models\Envoice;
use App\Models\User;
use App\Models\ResponceStatus;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;
use File;

class InvoiceController extends Controller
{

   

    public function index(Request $request,$id)
    {
    $data = Invoice ::select('invoices.*','website_amc.name as clint_name')
                    ->leftjoin('website_amc as website_amc','website_amc.id','invoices.website_amc_id')->where('website_amc_id',$id)->get();
                    
        return view('admin.invoice.index',compact('data','id'));
    }
    public function invo_detail(Request $request,$id)
    {
    $data = Invoice ::where('website_amc_id',$id)->get();
                    
        return view('admin.invoice.invoice_Details',compact('data','id'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.invoice.create');
    }


    public function invoice (Request $request,$id){
      
       
       if(!empty($request->amount)){
        for ($count = 0; $count <= count($request->amount); $count++) {
      
            if (isset($request->amount[$count])) { 
                
      $invoiceDetails = new Invoice;//model name
      $invoiceDetails -> user_id = Auth::user()->id;
      $invoiceDetails -> date = $request -> date[$count];
      $invoiceDetails -> description = $request -> description[$count];
      $invoiceDetails -> amount = $request -> amount[$count];
      $invoiceDetails -> payment_type = $request -> payment_type[$count];
      $invoiceDetails -> website_amc_id = $id;

      $invoiceDetails -> save();     
                
           }
       } 

        return redirect()->route('admin.invoice.index',[$id])
                        ->with('success','Invoice created successfully');
       }
       return view('admin.invoice.create',['invoice_id'=>$id]);
    }
           

      public function add(Request $request,$id) {
    $data=Leads::find($id);
    $userData =  User::find(Session::get('id'));
    if ($request -> isMethod('post')) {
        $invoice = Invoice::where('lead_id',$id)->get()->first();
       
        if(!empty($invoice)){
            
            $invoice = $invoice;
            $invoice -> net_amount = $invoice['net_amount']+$request -> net_amount;
            $invoice -> total_quantity = $invoice['net_amount']+$request -> total_qty;
        }else{
            $invoice = new Invoice;//model name
            $invoice -> net_amount = $request -> net_amount;
            $invoice -> total_quantity = $request -> total_qty;
        }

        for ($count = 0; $count <= count($request->item_name); $count++) {
      
            if (isset($request->item_name[$count])) { 
                

      $invoice = new Invoice;//model name
      $invoice -> date = $request -> date[$count];
      $invoice -> user_id = Session::get('id');
      $invoice -> lead_id = $id;
      $invoice -> invoice_id = $user_id;
      $invoice -> payment_type = $request -> payment_type[$count];
      $invoice -> payment_mode = $request ->payment_mode[$count];
      $invoice -> amount = $request -> amount[$count];
      $invoice -> save();     
                
           }
       } 

      return redirect:: to('admin.invoice.index') ->with ('message', 'Invoice add Successfully.');
    }
    return view('Invoice.add',['data'=>$data]);
  }
 


    
}