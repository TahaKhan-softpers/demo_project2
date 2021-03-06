<?php

namespace App\Repositories;

//use Illuminate\Http\Request;
use App\User;

class UserRepository
{
    /**
     * @Var User
     *
     *
     */
    protected $user;
    /**
     *
     * @param User $user
     *
     */
    public function  __construct(User $user)
    {
        $this->user = $user;
    }
   // new user store
   public function create($result){
       $this->user->create($result);
   }

   //show only one user record for edit
   public function edit($id){

       return $this->user->find($id);
   }

   // show individual user based on id
   public function showind($id){
       return  $this->user->where('id',$id)->get();
   }
   // show all users.
   public function showall(){
        return $this->user->all();
   }
   //to delete user
   public function delete($id){
        $this->user->user($id)->delete();
   }
   //to update user
   public function update($request, $id){
        $this->user->find($id)->update($request);
   }



}
