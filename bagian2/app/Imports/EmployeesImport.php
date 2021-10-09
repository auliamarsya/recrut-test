<?php

namespace App\Imports;

use App\Companies;
use App\Employees;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithBatchInserts, WithHeadingRow
{
    public function model(array $row)
    {
        return new Employees([
            'name' => $row['name'],
            'company_id' =>  Companies::where('name', $row['company'])->firstOrFail()->id,
            'email' => $row['email'],
            'created_at' => now()
        ]);
    }
    
    public function batchSize(): int
    {
        return 10;
    }

    public function headingRow(): int
    {
        return 2;
    }
}
