<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\Employees;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Companies::paginate(5);

        $data_employees = Employees::all();


        return view('admin.companies.index', compact('data', 'data_employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'balance' => 'required',
            'logo' => 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100',
            'web' => 'required'
        ]);

        $imageName = time() . '.' . $request->logo->extension();

        Companies::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'balance' => $request->balance,
            'logo' => $imageName,
            'web' => $request->web,
            'slug_url' => str_replace(' ', '-', $request->nama)
        ]);

        $request->logo->move(public_path('storage/app/company'), $imageName);



        return redirect()->route('admin.companies')->with('success', 'Data Companies Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Companies::find($id);
        return view('admin.companies.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Companies::find($id);

        if ($request->logo == '') {
            // Jika tidak ubah gambar
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'balance' => 'required',
                'web' => 'required',
            ]);

            $data->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'balance' => $request->balance,
                'web' => $request->web,
                'slug_url' => str_replace(' ', '-', $request->nama)


            ]);

            $history = History::find($id);

            // SAVE HISTORY
            $history->update([
                'company_last_balance' => $request->balance

            ]);
        } else {
            // jika ubah gambar
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'balance' => 'required',
                'logo' => 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100',
                'web' => 'required'
            ]);

            $imageName = time() . '.' . $request->logo->extension();

            $data->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'balance' => $request->balance,
                'logo' => $imageName,
                'web' => $request->web,
                'slug_url' => str_replace(' ', '-', $request->nama),
            ]);

            $history = History::find($id);

            // SAVE HISTORY
            $history->update([
                'company_last_balance' => $request->balance

            ]);

            $request->logo->move(public_path('storage/app/company'), $imageName);
            return redirect()->route('admin.companies')->with('success', 'Companies Berhasil diupdate');
        }
        return redirect()->route('admin.companies')->with('success', 'Companies Berhasil diupdate');
    }


    public function hapus($id)
    {
        $data = Companies::find($id);


        $logo = public_path('storage/app/company/' . $data->logo);
        unlink($logo);

        $data->delete();
        return redirect()->route('admin.companies')->with('success', 'Companies Berhasil dihapus');
    }


    
    public function pdf_employees()
    {
        $data = Employees::all();
        $pdf_employees = \PDF::loadView('admin.employees.pdf_employees', array('data'=>$data));

        // dd($data);
        return $pdf_employees->stream();
    }

    public function pdf_company()
    {
        $data = Companies::all();
        $pdf = \PDF::loadView('admin.companies.pdf', array('data'=>$data));

        // dd($pdf);
        return $pdf->stream();
    }



    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
