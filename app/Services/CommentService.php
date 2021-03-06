<?php

namespace App\Services;



use App\Repositories\CommentRepository;
use Dotenv\Repository\RepositoryBuilder;

class CommentService
{

    /**
     * @Var commentRepository
     *
     *
     */
    protected $commentRepository;
    /**
     *  Comment Service Constructor
     * @param CommentRepository $commentRepository
     *
     */
    public function  __construct(CommentRepository $commentRepository){
         $this->commentRepository=$commentRepository;
    }
    public function create($data){
        $this->commentRepository->create($data->all());
    }
    public function showind($id){
       return $this->commentRepository->showind($id);
    }
    public function edit($id){
        return $this->commentRepository->edit($id);
    }
    public function showall(){
        return $this->commentRepository->showall();
    }
    public function update($request,$id){
        $this->commentRepository->update($request,$id);
    }
    public function delete($id){

        $this->commentRepository->delete($id);
    }
}
