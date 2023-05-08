<?php

namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $role;

 function __construct($role) {
        $this->role = $role;
 }


    public function collection()
    {
        return User::select('id','first_name','email','phone')->whereHas(
            'roles', function($q){
                $q->where('name', $this->role);
            })->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Name", "Email","Phone"];
    }
}

