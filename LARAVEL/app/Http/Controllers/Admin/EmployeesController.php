<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\Employees;
use App\Models\History;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug_url)
    {
        // $employees = Employees::all();
        $data = Companies::where('slug_url', $slug_url)->skip(0)->take(5)->first();

        $data_employees = Employees::all();
        

        // dd($data);
        if (empty($data)) {
            // Jika Data Company Kosong
            return redirect()->back();
        } else {
            // Jika Data Company Ada
            $employees = DB::table('employees')
                ->select('companies.nama', 'employees.*')
                ->join('companies', 'employees.id_company', '=', 'companies.id')
                ->where(['employees.id_company' => $data->id])
                ->get();
        }


        return view('admin.employees.index', compact('data', 'employees', 'data_employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug_url)
    {
        $data = Companies::where('slug_url', $slug_url)->first();

        if (empty($data)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            // Jika kelas ada
            $company = Companies::all();
            return view('admin.employees.create', compact('data', 'company'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug_url)
    {
        $data = Companies::where('slug_url', $slug_url)->first();

        if (empty($data)) {
            // Jika Data Kosong
            return redirect()->back();
        } else {
            // Jika Data Ada
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'balance' => 'required'
            ]);

            Employees::create([
                'nama' => $request->nama,
                'company' => $data->nama,
                'balance' => $request->balance,
                'email' => $request->email,
                'id_company' => $data->id
            ]);
            // dd($data);
            $employees = DB::table('employees')
                ->select('companies.nama', 'employees.*')
                ->join('companies', 'employees.id_company', '=', 'companies.id')
                ->where(['employees.id_company' => $data->id])
                ->first();

            // dd($employees);
            History::create([
                'id_company' => $data->id,
                'id_employee' => $employees->id,
                'balance' => $employees->balance,
                'company_start_balance' => $data->balance,
                'company_last_balance' => $data->balance,
                'employees_start_balance' => $employees->balance,
                'employees_last_balance' => $employees->balance,

            ]);
        }




        return redirect()->route('admin.employees', $data->slug_url)->with('success', 'Data Employees Berhasil Disimpan');
    }

    public function hapus($slug_url, $id)
    {
        $data = Companies::where('slug_url', $slug_url)->first();

        if (empty($data)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            # Jika kelas ada
            $employees = Employees::find($id);

            $employees->delete();

            return redirect()->route('admin.employees', $data->slug_url)->with('success', 'Employees Berhasil Dihapus');
            // dd($data);
        }

        $data->delete();
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
    public function edit($slug_url, $id)
    {
        $data = Companies::where('slug_url', $slug_url)->first();
        if (empty($data)) {
            # Jika Data Tidak Ada
            return redirect()->back();
        } else {
            # Jika Data Tersedia
            $employees = Employees::find($id);
            return view('admin.employees.edit', compact('data', 'employees'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug_url, $id)
    {
        $data = Companies::where('slug_url', $slug_url)->first();

        if (empty($data)) {
            # Jika Data Kosong
            return redirect()->back();
        } else {
            # Jika Data Tersedia
            $request->validate([
                'nama' => 'required',
                'email' => 'required'
            ]);


            $employees = Employees::find($id);

            $employees->update([
                'nama' => $request->nama,
                'company' => $data->nama,
                'balance' => $request->balance,
                'email' => $request->email,
                'id_company' => $data->id
            ]);

            $employees = DB::table('employees')
                ->select('companies.nama', 'employees.*')
                ->join('companies', 'employees.id_company', '=', 'companies.id')
                ->where(['employees.id_company' => $data->id])
                ->first();

            $history = History::find($id);

            // dd($employees);
            $history->update([
                'id_company' => $data->id,
                'id_employee' => $employees->id,
                'balance' => $employees->balance,
                'employees_last_balance' => $request->balance,

            ]);

            return redirect()->route('admin.employees', $data->slug_url)->with('success', 'Transaksi Sukses');
        }

        // dd($request->all());



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
