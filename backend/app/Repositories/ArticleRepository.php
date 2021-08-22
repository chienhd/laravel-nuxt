<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryContract;
use App\Models\Article;

class ArticleRepository implements ArticleRepositoryContract
{
    /**
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Article::all();
    }

    public function find($id)
    {
        return Article::find($id);
    }
}
