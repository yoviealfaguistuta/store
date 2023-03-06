<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriControllers extends Controller
{
    public function list_kategori($idJenisbarang, $searchQuery, $idKategori)
    {
        $data["idJenisbarang"] = $idJenisbarang;
        $data["search"] = $searchQuery;
        $data["idKategori"] = $idKategori;
        return view('Kategori.list_kategori',compact('data'));
    }
}
