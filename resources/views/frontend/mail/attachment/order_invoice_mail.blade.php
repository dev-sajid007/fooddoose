<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
    
    hr {
    border: 0;
    clear:both;
    display:block;
    width: 96%;
    background-color:black;
    height: 1px;
    }
    h4{font-size: 20px;}
    p{font-size: 16px solid black;}
    /*.logo img{width:40%;height: 40%;margin-top:20px;}*/
    .top-section{margin-left: 20px;margin-right: 20px;inline:block;}
    .bill_from{display: block;float:left;width:70%;}
    .logo{display: block;float:left;width:30%;}
    .bill-to-invoice{margin-left:20px;inline:block;}
    .bill-to{display: block;float:left;width:60%; }
    .invoice-id{display: block;float:left;width:40%;}
    .product-table{inline:block;margin-left: 20px;margin-right:20px;margin-top: 50px;}
    .product-table table{width:100%;height: auto;}
    table th{text-align: left;margin-bottom: 20px;}
    table tr td{font-size: 16px;}
    .bottom{margin-left: 20px;margin-right: 20px;inline:block;margin-top: 50px;width: 100%}
    .notice{width:70%;display: block;float: left;}
    .total{width:30%;display: block;float: left;text-align: left;}
    .total table{width:100%;height: auto;margin-top: 25px;}
    .powered-by{margin-top: 20px;}
    </style>
  </head>
  <body>
    
    <div class="top-section">
      <div class="bill_from">
        <h4>Bill From</h4>
        <p>Road No- 4A House No- 57</p>
        <p>Apartment No- 4 Dhanmondi, Dhaka-1209</p>
      </div>
      <div class="logo">
        <img width="150px" height="45px;"  src="https://app.fooddoose.com/assets/frontend_assets/img/logo.png">
        
      </div>
    </div>
    <hr>
    <div class="bill-to-invoice">
      <div class="bill-to">
        
        <h4>Bill To</h4>
        <p>{{$orderDetail->customer_name}}

        </p>
      </div>
      <div class="invoice-id">
        <p>#Invoice : {{$orderDetail->order_no}}</p>
        <p>Invoice Date : {{$orderDetail->created_at}}</p>
        <p>Amount Due: {{$orderDetail-> total}}</p>
      </div>
      
    </div>
    <hr>
    <div class="product-table">
      <table>
        
        <thead>
          <tr>
            
            <th>Item</th>
            <!--<th>Price</th>-->
            <th>Total Price</th>
            <th>Quantity</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
       @foreach ($product_mapping as $product_mapping_info)
          <tr>
            <td><p>{{$product_mapping_info->name}}</p></td>
            <!--<td>{{$product_mapping_info->price}}</td>-->
            <td>{{$product_mapping_info->total_price}}</td>
            <td>{{$product_mapping_info->quantity}}</td>
            <td>{{$product_mapping_info->status}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <hr>
    <div class="bottom">
      
      <div class="notice">
        <h4>Notice/Memo From Fooddoose</h4>
        <p>Free Shopping With 30 days money guarantee</p>
      </div>
      <div class="total">
        <table>
          
          <tr>
            
            <td><b>Subtotal</b></td>
            <td><b>{{$orderDetail->total}}</b></td>
          </tr>
       
          <tr>
            
            <td><b>Delivery Charge </b></td>
            <td><b>{{$orderDetail->delivery_charge}}</b></td>
          </tr>
          <tr style="color:red;">
            
            <td><b>Total</b></td>
            <td><b>{{$orderDetail->total}}</b></td>
          </tr>
        </table>
        
        
      </div>
    </div>
    <hr>
    <div class="powered-by" align="center">
      <img widht="40px" height="40px" src="https://app.fooddoose.com/assets/frontend_assets/img/logo.png">
      <h4>Invoice Powered By Payrasoft</h4>
    </div>
  </body>
</html>