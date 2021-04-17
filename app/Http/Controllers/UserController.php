<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Developers;
use App\Service\UserService;
use App\Requests\DevelopersRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /* signup User */

      public function signupUser(DevelopersRequest $request)
    {
        try {
            $result = ['status' => 200];
            Log::info($request->developers());
            $developers =  new Developers();
            $result['data'] = $this->userService->signupUser($developers->fill($request->all()));
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }

    /**
     * list of user
     */
    public function getAllUser( )
    {
        try {
            $result = ['status' => 200];
            $user = $this->userService->getAllUser();
            $result['data'] = $user;
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }

    public function getUserById(Request $request)
    {
        try {
            $result = ['status' => 200];
            $result['data'] = $this->userService->getUserById($request['id']);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }

     /**
     * Update user based on id
     * 
     */

    public function updateUser(DevelopersRequest $request)
    {
        try {
            $result = ['status' => 200];
            Log::info($request->developers());
            $user = $this->userService->updateUser($request->developers(),$request['id']);
            $result['data'] = $user;
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }


     /**
     * Delete single user based on id
     * 
     */
    public function deleteUser($id)
    {
        try {
            $result = ['status' => 200];
            $user = $this->userService->deleteUser($id);
            $result['data'] = $user;
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }

    /**
     * login user based on email and password
     * 
     */
    public function loginUser(Request $request)
    {
        try {
            $result = ['status' => 200];
            $result['data'] = $this->userService->loginUser($request);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }

    /**
     * delete multiple user record
     */
        public function deleteMultipleUser(Request $request)
    {  
        try {
            $result = ['status' => 200];

            $user = $this->userService->deleteMultipleUser($request['ids']);
            $result['data'] = $user;
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
        
    }

    public function forgotPassword(Request $request)
    {
        try {
            $result = ['status' => 200];
            $result['data'] = $this->userService->forgotPassword($request->all());
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    
}
