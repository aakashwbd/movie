<?php

namespace App\Http\Controllers;

use App\Models\InviteCode;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InviteCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'], ['only' => ['getByUser']]);
    }
    public function store (Request $request){
        try {
            $invite = new InviteCode();
            $invite->title = $request->title;
            $invite->user_id = $request->user_id;
            $invite->package_id = $request->package_id;
            $invite->duration = $request->duration;
            $invite->reduction = $request->reduction;
            $invite->price = $request->price;


            if ($invite->save()){
                return response([
                    "status" => "success",
                    "message" => "The invite code has been generated"
                ]);
            }


        }catch (\Exception $e){
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function index (Request $request){
        try {
            $invite = InviteCode::with('user')
                ->with('package')
                ->get();

            if ($request->ajax()) {
                return Datatables::of($invite)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){
                        $button = '<button class="btn btn-primary btn-sm"  onclick="codeEditHandler('.$row->id.')">Edit</button>';

                        $button = $button.  '<button  class="btn btn-outline-secondary btn-sm ms-3" onclick="codeDeleteHandler('.$row->id.')">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }


            if ($invite){
                return response([
                                    "status" => "success",
                                    "data" => $invite
                                ]);
            }


        }catch (\Exception $e){
            return response([
                                'status' => 'serverError',
                                'message' => $e->getMessage(),
                            ], 500);
        }
    }

    public function getByUser (Request $request){
        try {
            $invite = InviteCode::with('package')
                ->where('user_id', auth()->id())
                ->get();

            if ($invite){
                return response([
                                    "status" => "success",
                                    "data" => $invite
                                ]);
            }


        }catch (\Exception $e){
            return response([
                                'status' => 'serverError',
                                'message' => $e->getMessage(),
                            ], 500);
        }
    }
}
