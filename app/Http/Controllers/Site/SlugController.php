<?php

namespace App\Http\Controllers\Site;

use App\Classes\StaticPageTypesEnum;
use App\Http\Controllers\Admin\PageController;
use App\Models;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SlugController extends Controller
{
    protected $slugRepository;

    /**
     * SlugController constructor.
     * @param SlugRepository $slugRepository
     */
    public function __construct(SlugRepository $slugRepository)
    {
        $this->slugRepository = $slugRepository;
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|Response|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request, $slug)
    {
        $obj = $this->slugRepository->getSlug($slug);

        if (is_null($obj)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        if ($obj->slug != $slug) {
            return redirect()->route('slug.index', $obj->slug);
        }

        $entity = $obj->entity;

        switch (true) {
            case $entity instanceof Models\Blog:
                return app(BlogController::class)->single($entity);
            case $entity instanceof Models\BlogCategory:
                return app(BlogController::class)->category($entity);
            case $entity instanceof Models\Page:
                switch ($entity->static_page_type) {
                    case StaticPageTypesEnum::BLOG_PAGE :
                        return app(BlogController::class)->index($request);
                }

                return app(PageController::class)->single($entity);

        }

        return abort(Response::HTTP_NOT_FOUND);
    }
}
