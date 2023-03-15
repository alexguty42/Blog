<?php

class Detail extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     * @description Get the post that owns the details
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function show(Post $post){
        $comments = $post->comments;
        return view('comments.show', compact('comments'));
        }
}
