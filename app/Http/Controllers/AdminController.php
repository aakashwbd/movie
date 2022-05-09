<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function  index(Request $request){
        $user = User::query()
            ->where('user_role_id', 1)
            ->orWhere('user_role_id', 2)
            ->latest()
            ->get();

        if ($request->ajax()) {
            return Datatables::of($user)
                ->addIndexColumn()
                ->editColumn('created_at', function($user){
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d M, Y h:i:s a',);
                    return $formatedDate;
                })
                ->addColumn('action', function($row){
//                    $button = '<button class="btn btn-primary btn-sm" onclick="adminEditHandler('.$row->id.')" data-id="'.$row->id.'">Edit</button>';
                    $button = '<button class="btn btn-outline-secondary btn-sm ms-3" onclick="adminDeleteHandler('.$row->id.')" data-id="'.$row->id.'">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response([
                            "status"=> 'success',
                            "data"=> $user
                        ]) ;
    }

    public function delete ($id){
        try {
            $admin = User::where('id', $id)->delete();
            return response([
                "status" => "success",
                "message" => 'Admin Delete Successfully Done'
            ]);
        }catch (\Exception $e){
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
