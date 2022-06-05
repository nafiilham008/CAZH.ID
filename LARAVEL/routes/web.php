<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');

        // User
        Route::get('/daftar/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.daftar.user');

        Route::get('daftar/user/{id}/hapus', [App\Http\Controllers\Admin\UserController::class, 'hapus'])->name('admin.daftar.hapus');
        Route::get('daftar/user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.daftar.edit');
        Route::patch('daftar/user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.daftar.update');

        // Companies
        Route::get('/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'index'])->name('admin.companies');

        Route::get('/companies/buat', [App\Http\Controllers\Admin\CompaniesController::class, 'create'])->name('admin.companies.buat');
        Route::post('/companies', [App\Http\Controllers\Admin\CompaniesController::class, 'store'])->name('admin.companies.store');
        Route::get('/companies/{id}/hapus', [App\Http\Controllers\Admin\CompaniesController::class, 'hapus'])->name('admin.companies.hapus');
        Route::get('/companies/{id}/edit', [App\Http\Controllers\Admin\CompaniesController::class, 'edit'])->name('admin.companies.edit');
        Route::patch('/companies/{id}/edit', [App\Http\Controllers\Admin\CompaniesController::class, 'update'])->name('admin.companies.update');

        // Employees
        Route::get('employees/{url_company}', [App\Http\Controllers\Admin\EmployeesController::class, 'index'])->name('admin.employees');
        Route::get('employees/{url_company}/tambah', [App\Http\Controllers\Admin\EmployeesController::class, 'create'])->name('admin.employees.tambah');
        Route::post('employees/{url_company}/simpan', [App\Http\Controllers\Admin\EmployeesController::class, 'store'])->name('admin.employees.simpan');

        Route::get('employees/{url_company}/hapus/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'hapus'])->name('admin.employees.hapus');
        Route::get('employees/{url_company}/edit/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'edit'])->name('admin.employees.edit');
        Route::patch('employees/{url_company}/update/{id}', [App\Http\Controllers\Admin\EmployeesController::class, 'update'])->name('admin.employees.update');

        // History
        Route::get('/history', [App\Http\Controllers\Admin\HistoryController::class, 'index'])->name('admin.history');
        Route::get('/history/download', [App\Http\Controllers\Admin\HistoryController::class, 'pdf_history'])->name('pdf.history');
        
        // PDF
        Route::get('/employees/download', [App\Http\Controllers\Admin\CompaniesController::class, 'pdf_employees'])->name('pdf.employees');
        Route::get('/companies/download', [App\Http\Controllers\Admin\CompaniesController::class, 'pdf_company'])->name('pdf.company');
    });
});
