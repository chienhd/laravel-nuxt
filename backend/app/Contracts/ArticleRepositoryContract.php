<?php

namespace App\Contracts;

interface ArticleRepositoryContract
{
    public function getAll();

    public function find($id);
}
