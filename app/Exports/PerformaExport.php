<?php
namespace App\Exports;
  
use App\Models\ProformaInvoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class PerformaExport implements FromCollection, WithHeadings
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
        $invoices = ProformaInvoice::with('billing','party')->select("id", "invoice_number", "invoice_date","billing_id","party_id","subtotal","total_cgst","total_sgst","total","remarks","status")->where($this->where)->get();
        foreach($invoices as $invoice)
        {
            $invoice->status = $invoice->status==1 ? 'Active' : 'Canceled';
            $invoice->billing_id = $invoice->billing->company_name;
            $invoice->party_id = $invoice->party->name;

        }
        return $invoices;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Invoice Number", "Invoice Date","Billing","Party","SubTotal","Total cgst","Total sgst","Total","Remarks","Expense","Status"];
    }
}