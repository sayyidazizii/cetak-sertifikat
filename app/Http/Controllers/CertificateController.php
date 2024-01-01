<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Participant;
use App\Models\Winner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\Facades\TCPDF;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;



class CertificateController extends Controller
{
    public function index()
    {
        $items = Certificate::select('*')
        ->where('data_state',0)
        ->orderBy('created_at','desc')
        ->simplePaginate(5);
        $participant = Participant::select('*')
        ->get();
        $winner = Winner::select('*')
        ->get();
        return view('content/Certificate/ListCertificate', compact('items','participant','winner'));
    }

     //simpan data 
     public function processAdd(Request $request)
     {
         $data = array(
             'participant_id'   => $request->participant_id,
             'winner_id'        => $request->winner_id,
             'certificate_no'   => 1,
             'certificate_date' => Carbon::now(),
             'created_id'       => Auth::id()
         );
         $save = Certificate::create($data);
         if ($save) {
            $msg = 'Tambah data Berhasil';
            return redirect('/certificate')->with('msg', $msg);
         } else {
            $msg = 'Tambah data Berhasil';
            return redirect('/certificate')->with('msg', $msg);
         }
     }
     public function Edit($certificate_id)
     {
         $data = Certificate::where('certificate_id',$certificate_id)
         ->first();
 
         $participant = Participant::select('*')
        ->get();
        $winner = Winner::select('*')
        ->get();
         return view('content/Certificate/FormEditCertificate', compact('data','participant','winner'));
     }
 
     public function processEdit(Request $request)
     {
        $data = Certificate::where('certificate_id', $request->certificate_id)
               ->update([
                 'participant_id'   => $request->participant_id,
                 'winner_id'        => $request->winner_id,
               ]
                 ); 
                 if ($data) {
                $msg = 'Edit data Berhasil';
                    return redirect('/certificate')->with('msg', $msg);
                } else {
                $msg = 'Edit data Gagal';
                    return redirect('/certificate')->with('msg', $msg);
                }  
     }
     public function delete($certificate_id)
     {
         $data = Certificate::where('certificate_id', $certificate_id)
         ->update([
           'data_state' => 1,
         ]
           );
         if ($data) {
             $msg = 'Hapus data Berhasil';
             return redirect('/certificate')->with('msg', $msg);
         } else {
             $msg = 'Hapus data Gagal';
             return redirect('/certificate')->with('msg', $msg);
         }
     }



     public function print($certificate_id){
        $data = Certificate::where('certificate_id',$certificate_id)
         ->first();
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        $pdf::SetPrintHeader(false);
        $pdf::SetPrintFooter(false);

        // $pdf::SetMargins(5, 1, 5, 1); // put space of 10 on top
        // Set margins
        $pdf::SetMargins(0, 0, 0);
        $pdf::SetAutoPageBreak(false);

        // $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);

        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::AddPage('L');

        $pdf::SetFont('helvetica', '', 10);

        // Get the dimensions of the A4 page in landscape
        $pageWidth = $pdf::getPageWidth();
        $pageHeight = $pdf::getPageHeight();

        // Set the image dimensions to match the page dimensions
        $imageWidth = $pageWidth;
        $imageHeight = $pageHeight;
       

        // $image = 'assets/img/sertifikat.png';
         // Display image on full page
        //  $pdf::Image($image, 0, 0, $imageWidth, $imageHeight, 'PNG', '', '', true, 150);
        //  $pdf::Image($image, 5, 5, 1000, 700, '', '', '', false, 1080, '', false, false, 0);

        $tbl = "
            <table width=\" 100% \" style=\"text-align: center; \">
                <tr>
                    <th style=\"font-size:10px; \"></th>
                </tr>
                <tr>
                    <th style=\"font-size:10px; \"></th>
                </tr>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <tr>
                    <th style=\"font-size:30px;font-weight: bold; \">".strtoupper($this->getNamebyId($data['participant_id']))."</th>
                </tr>
                <br><br><br>
                <tr>
                    <th style=\"font-size:20px; \">".$this->getWinnerbyId($data['winner_id'])."</th>
                </tr>
            </table>
            
        ";
        $pdf::writeHTML($tbl, true, false, false, false, '');
        $tblStock1 = "
        ";


        $pdf::writeHTML($tblStock1, true, false, false, false, '');


        $filename = 'Nota_Penjualan.pdf';
        $pdf::Output($filename, 'I');

    }



    //get 

    public function getNamebyId($participant_id)
    {
        $name = Participant::where('participant_id',$participant_id)
        ->first();
        return $name['participant_name'];
    }
    public function getWinnerbyId($winner_id)
    {
        $name = Winner::where('winner_id',$winner_id)
        ->first();
        return $name['winner_name'];
    }
}
