<?php

namespace App\Repositories;

use App\Repositories\RepositoryBase;

class ArticleRepository extends RepositoryBase
{
    protected $table = "articles";
    protected $columns = [
        "title", "url", "user_id", "published", "description", "key_words", "perex", "content", "priority", "discussion",
        "created_at", "updated_at"
    ]
    
    /**
     * Returns only one record by url
     *
     * @param [string] $url
     * @return void
     */
    public function getByUrl(string $url) {
        return parent::getRecordList("url='$url'");
    }
}