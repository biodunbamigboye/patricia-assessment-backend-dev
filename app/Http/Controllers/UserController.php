<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->isUserValid($id)) return $this->errorResponse();
        $user = USer::find($id);
        $response = [
            'user' => $user,
            'message' => 'user data fetched',
            'success' => true
        ];
        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->isUserValid($id)) return $this->errorResponse();
        $fields = $request->validate([
            'name' => ' string',
            'email' => 'string|unique:users,email|email',
            'password' => 'string|confirmed'
        ]);
        $user =  User::find($id);
        $password = isset($fields['password']) ? bcrypt($fields['password']) : $user->password;

        $user->update([
            'name' => $request['name'] ?? $user->name,
            'email' => $request['email'] ?? $user->email,
            'password' => $password
        ]);
        $response = [
            'user' => $user,
            'message' => 'user data  update successful',
            'success' => true
        ];
        return $response;
    }
    /**
     *
     *@param int
     *
     * This Function Checks if the user is trying to
     * Manipulate an authorized Information. It terminates the
     * Operation if its not authorized
     *
     */

    public function isUserValid($id)
    {
        return (auth()->user()->id == $id);
    }

    /**
     * Error message thrown when a user is not
     * authorized to perform an action
     *
     * @return Object
     */
    protected function errorResponse()
    {
        return response([
            'message' => 'unauthorized access',
            'success' => false
        ], 401);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int
     * Deletes a user data
     */
    public function destroy($id)
    {
        if (!$this->isUserValid($id)) return $this->errorResponse();
        $delete = User::destroy($id);
        $message = $delete ? 'User Deleted' : 'operation not Successful';
        return [
            'message' => $message,
            'success' => (bool) $delete
        ];
    }
}
