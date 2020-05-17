<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            'fullname'  => $row[0],
            'document'  => $row[1],
            'email'     => $row[2],
            'phone'     => $row[3],
            'gender'    => $row[4],
            'address'   => $row[5], 
            'password'  => bcrypt($row[6]),
        ]);
    }
}
