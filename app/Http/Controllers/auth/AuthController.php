<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\favourite;
use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

use DataTables;
use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'], ['only' => ['getAll', 'profileInfo']]);
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "email" => "unique:users|email:rfc,dns",
                "phone" => "unique:users",
                "password" => "required|min:6",
            ]);



            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->username = $request->username;
            $user->dob = $request->dob;
            $user->age = $request->age;
            $user->address = $request->address;
            $user->presentation = $request->presentation;
            $user->image = $request->image;
            $user->user_role_id = $request->user_role_id ?? 3;
            $user->password = Hash::make($request->password);

            if ($user->user_role_id === 3) {
                $user->status = 'pending';
            }
            if ($user->save()) {
                return response([
                    "status" => "success",
                    "form" => 'registration',
                    "message" => "Registration Successfully Complete"
                ]);
            }

        } catch (Exception $e) {
            return response([
                "status" => "server_error",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'email' => 'exists:users',
                'phone' => 'exists:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }
            if (!auth()->attempt($validator->validated())) {
                $errors = [
                    'password' => ["Password doesn't matched..."]
                ];
                return validateError($errors);
            }

            $accessToken = auth()->user()->createToken('authToken');
            return response([
                'status' => 'success',
                'message' => 'Successfully logged in...',
                'form' => 'login',
                'data' => [
                    'token' => 'Bearer ' . $accessToken->plainTextToken,
                    'user' => auth()->user(),
                ],
            ], 200);
        } catch (Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $userData = User::where('id', $id)->first();

            return response([
                "status" => "success",
                "data" => $userData
            ]);

        } catch (Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);

        }

    }

    public function statusUpdate(Request $request, $id)
    {
        try {
            $userData = User::where('id', $id)->first();

            if ($userData) {
                $userData->status = $request->status ?? $userData->status;
                if ($request->status === 'suspend') {
                    if ($userData->update()) {
                        return response([
                            "status" => "success",
                            "message" => "User has been banned.
"
                        ]);
                    }
                }
                if ($request->status === 'active') {
                    if ($userData->update()) {
                        return response([
                            "status" => "success",
                            "message" => "User has been accepted."
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function checkEmail(Request $request)
    {

        try {
            $user = User::where('phone', $request->phone)
                ->where('email', $request->email)
                ->first();

            return response([
                "status" => "success",
                "form" => "recoverForm",
                "data" => $user
            ]);
        } catch (Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);

        }

    }

    public function userOnlineStatus()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }

    public function profileInfo(Request $request)
    {
//        dd($request->all());

        try {
            $userData = User::where('id', auth()->id())->first();
            if ($userData) {
                $userData->username = $request->username ?? $userData->username;
                $userData->dob = $request->dob ?? $userData->dob;
                $userData->address = $request->address ?? $userData->address;
                $userData->test = $request->test ?? $userData->test;
                $userData->preference = $request->preference ?? $userData->preference;
                $userData->presentation = $request->presentation ?? $userData->presentation;
                $userData->image = $request->image ?? $userData->image;

                if ($userData->update()) {
                    return response([
                        "status" => "success",
                        "message" => "The profile information has been updated",

                    ]);
                }
            }


        } catch (Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);

        }

    }

    public function updatePassword(Request $request)
    {
        try {
            $userData = User::where('phone', $request->phone)
                ->where('email', $request->email)
                ->first();
            if ($userData) {
                $userData->password = Hash::make($request->password) ?? $userData->password;

                if ($userData->update()) {
                    return response([
                        "status" => "success",
                        "form" => "passwordChanged",
                        "message" => "The password has been recovered."
                    ]);
                }
            }
        } catch (Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);

        }

    }

    public function getAll(Request $request)
    {
        try {
            $user = User::where('user_role_id', 3)
                ->get();

            return response([
                "status" => "success",
                "data" => $user
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getByUnAuth(Request $request)
    {

        try {
            $user = User::where('user_role_id', 3)
                ->get();


            return response([
                "status" => "success",
                "data" => $user
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function fetchAllUser(Request $request)
    {

        try {
            $user = User::where('user_role_id', 3)
                ->get();


            return response([
                "status" => "success",
                "data" => $user
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function searchUser(Request $request)
    {
        try {
            $min = (int)$request->minage;
            $max = (int)$request->maxage;

            if($request->address){
                $user = User::where('address', 'LIKE', '%' . $request->address . '%')
                    ->get();
                return response([
                    "status" => "success",
                    "action" => "search-user",
                    "data" => $user
                ]);
            }else if($min && $max){
                $user = User::whereBetween('age', [$min, $max])
                    ->get();
                return response([
                    "status" => "success",
                    "action" => "search-user",
                    "data" => $user
                ]);
            }else if($request->type){
                $user = User::where('preference', 'LIKE', '%' . $request->type . '%')->get();
                return response([
                    "status" => "success",
                    "action" => "search-user",
                    "data" => $user
                ]);
            }else if($request->member === 'all'){
                $user = User::query()
                    ->get();
                return response([
                    "status" => "success",
                    "action" => "search-user",
                    "data" => $user
                ]);
            }else if($request->member === 'new'){
                $user = User::query()
                    ->latest()
                    ->get();
                return response([
                    "status" => "success",
                    "action" => "search-user",
                    "data" => $user
                ]);
            }else if($request->keyword){
                $user = User::query()
                    ->where('presentation', 'LIKE', '%' . $request->keyword . '%')
                    ->get();
                return response([
                    "status" => "success",
                    "action" => "search-user",
                    "data" => $user
                ]);
            }else{
                dd($request->all());
                $user = User::query()
                    ->get();
                return response([
                                    "status" => "success",
                                    "action" => "search-user",
                                    "data" => $user
                                ]);
            }

        } catch (\Exception $e) {
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function index(Request $request)
    {
        $user = User::where('user_role_id', 3)->latest()->get();
        if ($request->ajax()) {
            return Datatables::of($user)
                ->addIndexColumn()
                ->editColumn('created_at', function ($user) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d M, Y h:i:s a');
                    return $formatedDate;
                })
                ->addColumn('action', function ($row) {
                    $button = '';

                    if ($row->status === 'active') {
                        $button = '<button
                                        disabled
                                        id="user-accept-button"
                                        class="btn btn-primary btn-sm text-capitalize"
                                        data-id="' . $row->id . '"
                                        onclick="userHandler(' . $row->id . ')"
                                   >
                                        Accept
                                   </button>';
                    } else if ($row->status === 'suspend' || $row->status === 'pending') {
                        $button = '<button
                                            id="user-accept-button"
                                            class="btn btn-primary btn-sm text-capitalize"
                                            data-id="' . $row->id . '"
                                            onclick="userHandler(' . $row->id . ')"
                                       >
                                            Accept
                                       </button>';
                    }

                    if ($row->status === 'suspend') {
                        $button = $button . '<button
                                                    disabled
                                                    class="btn btn-outline-secondary btn-sm text-capitalize ms-3"
                                                    data-id="' . $row->id . '"
                                                    onclick="userBannedHandler(' . $row->id . ')"
                                                >
                                                    banned
                                                </button>';
                    } else if ($row->status === 'active' || $row->status === 'pending') {
                        $button = $button . '<button
                                                    class="btn btn-outline-secondary btn-sm text-capitalize ms-3"
                                                    data-id="' . $row->id . '"
                                                    onclick="userBannedHandler(' . $row->id . ')"
                                                >
                                                    banned
                                                </button>';
                    }

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response([
            "status" => 'success',
            "data" => $user
        ]);
    }
    public function getAllUsers(Request $request)
    {
        $user = User::where('user_role_id', 3)->latest()->get();
        if ($request->ajax()) {
            return Datatables::of($user)
                ->addIndexColumn()
                ->editColumn('created_at', function ($user) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d M, Y h:i:s a');
                    return $formatedDate;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response([
            "status" => 'success',
            "data" => $user
        ]);
    }

    public function suspendUser(Request $request)
    {
        $user = User::where('user_role_id', 3)
            ->where('status', 'suspend')
            ->latest()
            ->get();
        if ($request->ajax()) {
            return Datatables::of($user)
                ->addIndexColumn()
                ->editColumn('created_at', function ($user) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d M, Y h:i:s a');
                    return $formatedDate;
                })
                ->addColumn('action', function ($row) {
                    $button = '<button class="btn btn-primary btn-sm text-capitalize" data-id="' . $row->id . '" onclick="userHandler(' . $row->id . ')">Accept</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response([
            "status" => 'success',
            "data" => $user
        ]);
    }


}
