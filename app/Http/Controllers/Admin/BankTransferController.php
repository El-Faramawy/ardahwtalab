<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pays;

class BankTransferController extends Controller {

    public function index() {
        return view('admin.banktransfer.index', ['pays' => \App\Models\Pays::all()]);
    }

}
