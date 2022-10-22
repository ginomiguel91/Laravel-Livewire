<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();

        try {

       

            $role = Role::create($data);

            return new RoleResource($role);
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        try {
            return new RoleResource($role);
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $role->update($request->validated());
            return new RoleResource(($role));
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();

            return $this->sendSuccessResponse('Role was deleted successfully!');
        } catch (\Throwable $th) {
            report($th);
            return $this->sendErrorResponse($th->getMessage());
        }
    }
}
