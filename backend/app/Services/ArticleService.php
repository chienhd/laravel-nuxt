<?php

namespace App\Services;

use App\Contracts\ArticleRepositoryContract;

class ArticleService implements ArticleServiceContract
{
    /**
     * @var ArticleRepositoryContract
     */
    private $articleRepository;

    public function __construct(ArticleRepositoryContract $articleRepositoryContract)
    {
        $this->articleRepository = $articleRepositoryContract;
    }
    public function testArticle($id)
    {
        $data = $this->articleRepository->find($id);
        return response()->json([
            'data' => $data,
            'header' => 1,
        ], 200);
    }
}
