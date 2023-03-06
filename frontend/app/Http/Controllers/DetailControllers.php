<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailControllers extends Controller
{
    public function detail_barang($idBarang)
    {
        $data["idBarang"] = $idBarang;
        // $data["search"] = $search;
        return view('Detail.detail_barang',compact('data'));
    }
}
