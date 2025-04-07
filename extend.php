<?php

namespace Oncdev\NestedReplies;

use Flarum\Extend;
use Flarum\Post\Post;
use Flarum\User\User;
use Flarum\Api\Serializer\PostSerializer;
use Flarum\Api\Serializer\UserSerializer;

return [
    // Înregistrează extensia
    (new Extend\Extension)
        ->name('Nested Replies'),

    // Înregistrează un câmp personalizat 'parent_post_id' în baza de date pentru a stoca ID-ul postării părinte
    (new Extend\Model(Post::class))
        ->addField('parent_post_id'),

    // Adaugă logica de manipulare a ierarhiei postărilor
    (new Extend\ApiSerializer(PostSerializer::class))
        ->attributes(function ($serializer, $post, $attributes) {
            if ($post->parent_post_id) {
                $attributes['parent_post_id'] = $post->parent_post_id;
            }
            return $attributes;
        }),

    // Adaugă logică pentru utilizatorii care pot interacționa cu postările
    (new Extend\ApiSerializer(UserSerializer::class))
        ->attributes(function ($serializer, $user, $attributes) {
            // Dacă e nevoie, poți adăuga logica de permisivitate pentru răspunsuri
            return $attributes;
        }),
];
