<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\WorkshopRepositoryInterface;

class FrontService
{
    protected $categoryRepository;
    protected $workshopRepository;

    public function __construct(WorkshopRepositoryInterface $workshopRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->workshopRepository = $workshopRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getFrontPageData()
    {
        $newWorkshops = $this->workshopRepository->getAllNewWorkshops();
        $categories = $this->categoryRepository->getAllCategories();

        return compact('newWorkshops', 'categories');
    }
}
