<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Participant;
use App\Models\Winner;



class CertificateController extends Controller
{
    public function index()
    {
        $items = Certificate::select('*')
        ->get();
        return view('content/Certificate/ListCertificate', compact('items'));
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
