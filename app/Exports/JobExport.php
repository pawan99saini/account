<?php
namespace App\Exports;
  
use App\Models\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class JobExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $where;

    public function __construct($where) {

        $this->where = $where;
    }

    public function collection()
    {
        $Jobs = Job::select("id", "name", "is_used")->where($this->where)->get();
        foreach($Jobs as $job)
        {
            $job->is_used = $job->is_used==1 ? 'Used' : 'Pending';
        }
        return $Jobs;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Name", "Status"];
    }
}