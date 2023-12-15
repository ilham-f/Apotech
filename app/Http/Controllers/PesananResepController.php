<?php

namespace App\Http\Controllers;

use App\Models\PesananResep;
use App\Http\Requests\StorePesananResepRequest;
use App\Http\Requests\UpdatePesananResepRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Auth;

class PesananResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pesananresep', [
            'pesananresep' => PesananResep::latest()->paginate(4),
            'title' => 'pesanan resep'
        ]);
    }

    public function indexuser()
    {
        $userid = auth()->user()->id;
        $resep = Resep::where('user_id', $userid);
        $pesananResep = PesananResep::where('resep_id', $resep->id);
        return view('user.riwayatpembelianresep', [
            'pesananresep' => $pesananResep,
            'title' => 'pesanan resep'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePesananResepRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesananResepRequest $request)
    {
        PesananResep::create([
            'resep_id' => $request['resep_id'],
            'obat_obat' => $request['obat_obat'],
            'total_harga' => $request['total_harga']
        ]);

        return redirect()->back();
    }

    public function updateStatPesananResep(Request $request)
    {
        $transaksi = PesananResep::find($request['id']);
        $transaksi->update(['status' => $request['status']]);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesananResep  $pesananResep
     * @return \Illuminate\Http\Response
     */
    public function show(PesananResep $pesananResep)
    {
        return view('admin.detilpesananresep', [
            'pesananresep' => $pesananResep,
            'title' => 'detil pesanan resep'
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesananResep  $pesananResep
     * @return \Illuminate\Http\Response
     */
    public function edit(PesananResep $pesananResep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesananResepRequest  $request
     * @param  \App\Models\PesananResep  $pesananResep
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesananResepRequest $request, PesananResep $pesananResep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesananResep  $pesananResep
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesananResep $pesananResep)
    {
        //
    }
}
