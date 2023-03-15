<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends Model
{
    use HasFactory;

    /**
     * @return HasOne
     * @description get the detail associated with the post
     */
    public function detail(): HasOne
    {
        return $this->hasOne(Detail::class);
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'post_id';
}
