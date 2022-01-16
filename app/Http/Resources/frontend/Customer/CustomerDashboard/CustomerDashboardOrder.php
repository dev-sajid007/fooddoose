<?php


namespace App\Http\Resources\frontend\Customer\CustomerDashboard;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class CustomerDashboardOrder  extends JsonResource
{
    private $code=403;
    public function toArray($request)
    {
        return [
            'order_no' => $this->order_no,
            'customer_name' => $this->customer_name,
            'email_address' => $this->email,
            'customer_delivery_address' => $this->delivery_address,
            'total_amount' => round($this->total,1),
            'delivery_charge' => round($this->delivery_charge,1),
            'order_status'=>$this->status,
            'order_placement_date' => $this->created_at->format('d/m/Y'),
            'order_update_date' => $this->updated_at->format('d/m/Y'),
            'today'=>date('d/m/Y'),
        ];
    }

    public  function  with($request){

        return ['version'=>'are you kidding'];
    }
}
