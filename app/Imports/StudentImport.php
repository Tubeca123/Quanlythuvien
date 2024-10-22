<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Student;

class StudentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection[0][0]);
        $data= [];
        foreach ($collection as $key => $row) {
            
            $data[] = [
                'Ma_sv' => $row[0],
                'Name' => $row[1],
                'Gmail' => $row[2],
            ];
           
        }
        
        // $data = [
        //     'Ma_sv' => $collection[0][0],
        //     'Name' => $collection[0][1],
        //     'Gmail' => $collection[0][2],
        // ];
        
        return  Student::insert($data);
    }
}
