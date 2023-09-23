<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class Client implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Client::all();
    }
}
