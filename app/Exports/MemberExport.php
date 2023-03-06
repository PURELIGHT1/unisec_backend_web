<?php

namespace App\Exports;

use App\Models\Member;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberExport implements FromView
{
    public function view(): View
    {
        return view('exports.member', [
            'members' => Member::class::memberRelasi()
        ]);
    }
}
