<?php
namespace App\Exports;
  
use App\Models\InvoiceDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ItemExport implements FromCollection, WithHeadings
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
        
        $items = InvoiceDetail::with('invoice','service','cat','job')->whereHas('invoice', function ($query)
        { 
            $query->where($this->where);
         })->select('id','job_id','invoice_id','category_id','service_id','from','to','rate','gst','sac','remarks','job_exe_id','Internal_job','status','type')->get();
         foreach($items as $item)
        {
            $item->invoice_id = $item->invoice->invoice_number;
            $item->service_id = $item->service->narration;
            $item->category_id = $item->cat->name;
            $item->job_id = $item->job->name;
            $job_exe_id = $item->job_exe_id ? json_decode($item->job_exe_id,true) : [];
            $exe_id = getJobExecution($job_exe_id);
            $item->job_exe_id = implode(",",$exe_id);
            $item->from = ($item->from=='1970-01-01') ? '' : $item->from;
            $item->to = ($item->to=='1970-01-01') ? '' : $item->to;
        }
        return $items;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID","JOB","Invoice Number", "Category","Service","from","to","Rate","GST","Sac","Remarks","Job exe id","Internal job","status","type"];
    }
}