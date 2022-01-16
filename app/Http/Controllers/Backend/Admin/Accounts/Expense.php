<?php

namespace App\Http\Controllers\Backend\Admin\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Response;

class Expense extends Controller
{
    public function show_expense()
    {
        return view('admin.extends.accounts.expense.manage_expense');
    }
    public function get_all_expenses()
    {
        $query = DB::table('expense')
            ->select('expense_id', 'purpose', 'vendor', 'amount', 'expense_date', 'created_at', 'updated_at');
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->expense_id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="bi bi-pencil-square"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button name="delete" id="' . $data->expense_id . '" class="delete btn btn-danger btn-sm confirmDelete" record="Area" recordid="{{$data->AreaID}}"><i class="bi bi-trash-fill"></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    public function delete_expense_api($id)
    {
        $select_expense_info = DB::table('expense')->where('expense_id', '=', $id)->first();

        DB::table('expense')
            ->where('expense_id', '=', $id)
            ->delete();
        return 'successfully deleted';
    }
    public function single_expense_table_information($id)
    {
        $data = DB::table('expense')->where('expense_id', '=', $id)->first();
        return response()->json($data);
    }
    public function store_expense(Request $request)
    {

        $this->validate($request, [
            'purpose' => 'required',
            'vendor' => 'required',
            'amount' => 'required',
            'expense_date' => 'required',
            'description' => 'required',
            // 'expense_image' => 'required',
        ]);

        $data = array(
            'purpose' => $request->purpose,
            'vendor' => $request->vendor,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
        );
        DB::table('expense')->insert($data);
        return response()->json($data);
    }
    public function update_expense(Request $request)
    {
        // return(dd($request->all()));
        $select_team_image = DB::table('expense')->where('expense_id', $request->expense_id)->first();

        $data = array(
            'purpose' => $request->purpose,
            'vendor' => $request->vendor,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        DB::table('expense')
            ->where('expense_id', $request->expense_id)
            ->update($data);
        return response()->json($data);
    }
}
