<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportUserView implements FromView
{
    public function view(): View
    {
        return view('Admin.Excel.user', [
            'user' => User::with(['pelanggan'])->where('role','Pelanggan')->get()
        ]);
    }
}



