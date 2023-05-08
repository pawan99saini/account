<?php

namespace App\Imports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\ToModel;

class JobsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $find = Job::where('name','=',$row[0])->first();
        if(empty($find))
        {
        return new Job([
            'name' => $row[0],
            'status'=>1
        ]);
    }
    }

    
}
