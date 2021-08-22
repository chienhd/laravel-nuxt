<?php

namespace App\Http\Controllers;

use App\Services\ArticleServiceContract;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Contracts\ArticleRepositoryContract;

class ArticleController extends Controller
{
    private $articleRepository;
    /**
     * @var ArticleServiceContract
     */
    private $articleServiceContract;

    public function __construct(
        ArticleRepositoryContract $articleRepositoryContract,
        ArticleServiceContract $articleServiceContract
    )
    {
        $this->articleRepository = $articleRepositoryContract;
        $this->articleServiceContract = $articleServiceContract;

    }
    public function index()
    {
        return $this->articleRepository->getAll();
    }

    public function show($id)
    {
        return $this->articleServiceContract->testArticle($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
