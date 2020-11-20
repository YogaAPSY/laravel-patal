<?php

namespace App\Http\Controllers;

use App\Patal;
use Illuminate\Http\Request;

class PatalController extends Controller
{
    public function index()
    {
        $patals = Patal::latest()->get();

        return view('patal.index',['patals' => $patals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patal.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:patals,email',
            'phone' => 'required'
        ]);

        $Patal = new Patal;

        $Patal->name = $request->input('name');
        $Patal->email = $request->input('email');
        $Patal->phone = $request->input('phone');

        $Patal->save();

        $message = "Patal berhasil di input";
        return redirect()->route('patal.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patal  $Patal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'show';
        $patal = Patal::where('id', $id)->first();

        return view('patal.form', ['patals' => $patal, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patal  $Patal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patals = Patal::findOrFail($id);
        return view('patal.form', ['patals' => $patals]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patal  $Patal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:patals,email,' . $id,
            'phone' => 'required'
        ]);


        $Patal = Patal::findOrFail($id);
        $Patal->name = $request->input('name');
        $Patal->email = $request->input('email');
        $Patal->phone = $request->input('phone');

        $Patal->save();

        $message = "Patal berhasil di Edit";
        return redirect()->route('patal.index')->withSuccess($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patal  $Patal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patal = Patal::find($id);
        $patal->delete();

        if ($patal) {

            return redirect()->route('patal.index')->withSuccess('Berhasil hapus');
        } else {

            return redirect()->route('patal.index')->withErrors('Gagal Hapus');
        }
    }
}
