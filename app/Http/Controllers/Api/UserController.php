<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

        $data = $request->validated();

        try {

            $data["password"] = Hash::make($data['password']);

            $user = User::create($data);

            return new UserResource($user);
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
            return new UserResource($user);
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }
    }

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UserStoreRequest $request)
    {
        try {
            $user->update($request->validated());
            return new UserResource(($user));
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return $this->sendSuccessResponse('User was deleted successfully!');
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }
    }
}
