<?php

// @todo move to helper function
function isOdd($number)
{
    if($number & 1){
        return true;
    } else {
        return false;
    }
}
?>

<style>
    .post-preview {
        border-bottom: 1px #ccc solid;
        margin-bottom: 20px;
    }
    @media (min-width: 992px) {
        .post-right-text {
            text-align: right;
        }

        .post-right {
            float: right;
        }
    }
</style>

@foreach ($posts as $key => $post)
    <div class="row post-preview {{ isOdd($key) ? 'post-right-text' : '' }}">
        <div class="col-xs-12 col-md-5 {{ isOdd($key) ? 'post-right' : '' }}">
            <a href="{{ $post->url($tag) }}" class="{{ isOdd($key) ? '' : 'post-right' }}">
                @if ($post->page_image)
                    <figure style="width: 340px; height: 210px; background: url({{ asset($post->page_image)}}); background-size: cover;"></figure>
                @else
                    <figure style="width: 340px; height: 210px; background: url('http://via.placeholder.com/340x210?text=No+Image'); background-size: cover;"></figure>
                @endif
            </a>
        </div>

        <div class="col-xs-12 col-md-7">
            <h2 class="post-title ">
                <a href="{{ $post->url($tag) }}">{{ $post->title }}</a>
            </h2>
            <p class="post-meta">
                {{ $post->published_at->diffForHumans() }} &#183; {{ $post->readingTime() }} MIN READ
                <br>
                @unless ($post->tags->isEmpty())
                    {!! implode(' ', $post->tagLinks()) !!}
                @endunless
            </p>
            <p class="postSubtitle">
                {{ str_limit($post->subtitle, config('blog.frontend_trim_width')) }}
            </p>
            <p style="font-size: 13px">
                <a href="{{ $post->url($tag) }}">READ MORE...</a>
            </p>
        </div>
    </div>
@endforeach