<?php

namespace App\Imports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionImport implements ToModel
{
    public function model(array $row)
    {
        return new Transaction([
            'vendor_id'         => $row[0],
            'site_id'           => $row[1],
            'user_id'           => $row[2],
            'department_id'     => $row[3],
            'subdepartment_id'  => $row[4],
            'brand_id'          => $row[5],
            'transdate'         => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
            'transtime'         => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
            'transid'           => $row[8],
            'plu'               => $row[9],
            'price'             => $row[10],
            'qty'               => $row[11],
            'amount'            => $row[12],
            'margin'            => $row[13],
        ]);
    }
}
?>
