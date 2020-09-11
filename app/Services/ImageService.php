<?php

namespace App\Services;


use App\Repositories\ImageRepository;
use Dotenv\Repository\RepositoryBuilder;

class ImageService
{

    /**
     * @Var imageRepository
     *
     *
     */
    protected $imageRepository;

    /**
     *  Image Service Constructor
     * @param ImageRepository $imageRepository
     *
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function create($data)
    {
        $this->imageRepository->create($data->all());
    }

    public function find($id)
    {
        return $this->imageRepository->find($id);
    }

    public function edit($id)
    {
        return $this->imageRepository->edit($id);
    }

    public function show()
    {
        return $this->imageRepository->show();
    }

    public function update($request, $id)
    {
        $this->imageRepository->update($request, $id);
    }

    public function delete($id)
    {
        $this->imageRepository->delete($id);
    }

    public function deleteFromfolder($id)
    {
        // post id
        return $this->imageRepository->postImage($id);

    }

}
