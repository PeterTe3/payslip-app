<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Models\Payslip;
use App\Models\Batch;
use App\Models\User;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $page_description = 'This is the page description for this specific view';
        return view('home');
    }

    public function getDashboard(Request $request)
    {
        $data['page_title'] = 'Dashboard';
        $data['bat_info'] = DB::table('batches')
            ->leftJoin('users', 'batches.gen_user', '=', 'users.id')
            ->leftJoin('payslips', 'batches.id', '=', 'payslips.bid')
            ->select('batches.id as id', 'batches.status as status', DB::raw('count(payslips.bid) as count'))
            ->groupBy('batches.id', 'batches.status')
            ->get();

        $bat_info = DB::table('batches')
            ->leftJoin('users', 'batches.gen_user', '=', 'users.id')
            ->select('batches.id', 'batches.gen_date', 'batches.status', 'users.name')->get();

        $data['bat_info'] = $bat_info->map(function($val) {
            return [
                'id' => $val->id,
                'gen_date' => $val->gen_date,
                'status' => $val->status,
                'tcount' => $this->payslipcount($val->id),
                'name' => $val->name
            ];
        });

        return view('index', $data);
    }

    public function payslipcount($bid)
    {
        return Payslip::where('bid', $bid)->count();
    }

    public function batchgendate($bid)
    {
        $info = Batch::where('id', $bid)->select('gen_date')->first();
        $tmp = explode('/', $info->gen_date);
        return $tmp[2] . '/' . $tmp[1] . '/' . $tmp[0];
    }

    public function getBatch($batchid)
    {
        $data['page_title'] = 'Batch No: ' . $batchid;
        $data['batch'] = Payslip::where('bid', $batchid)->get();
        $data['page_description'] = 'Data Count: ' . $this->payslipcount($batchid) . ' | Uploaded on: ' . $this->batchgendate($batchid);
        return view('batch_list', $data);
    }

    public function deleteBatch($batch_id)
    {
        Batch::where('id', $batch_id)->update(['status' => 0]);
        Payslip::where('bid', $batch_id)->delete();
        return redirect()->route('home');
    }

    public function deletePayslip($tblid)
    {
        Payslip::where('id', $tblid)->delete();
        return back();
    }

    public function getExportPDF(Request $request)
    {
        $items = Payslip::where('id', $request->tblid)->get();
        view()->share('payslips', $items);

        if ($request->has('download')) {
            $pdf = PDF::loadView('payslip_pdf', compact('items'));
            return $pdf->download('payslip-pdf.pdf');
        }

        return view('payslip_pdf', compact('items'));
    }

    public function postExportBulkPDF(Request $request)
    {
        $all_payslips = [];
        $paysliplist = $request->paysliplist ?? [];

        foreach ($paysliplist as $tblid) {
            $items = Payslip::where('id', $tblid)->get();
            $all_payslips = array_merge($all_payslips, $items->toArray());
        }

        view()->share('payslips', $all_payslips);
        $pdf = PDF::loadView('payslip_pdf', compact('all_payslips'));

        return $pdf->download('payslip-pdf.pdf');
    }

    public function sendPayslipEmails(Request $request)
    {
        $paysliplist = $request->paysliplist ?? [];
        foreach ($paysliplist as $tblid) {
            $items = Payslip::where('id', $tblid)->get();
            $pdf = PDF::loadView('payslip_pdf', compact('items'))->output();

            $email = $items[0]->email; // Assuming each payslip has an associated email
            $data = [
                'subject' => 'Your Payslip',
                'email' => $email,
                'bodyMessage' => 'Please find your payslip attached.'
            ];

            Mail::send('emails.payslip', $data, function ($message) use ($data, $pdf) {
                $message->to($data['email'])
                    ->subject($data['subject'])
                    ->attachData($pdf, "payslip.pdf");
            });
        }

        return back()->with('success', 'Payslips sent successfully!');
    }
}


