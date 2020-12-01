@foreach ($data['post'] as $post)
<div class="col-md-3 col-sm-6 col-xs-12">
    <article class="entry entry-sm">
        <div class="entry-border">
            <div class="feature-post feature-post-sm">
                <a href="{{ route('customer.post.detail', $post->slug) }}">
                    <img class="lazy"
                        data-src="{!! url('storage/'.  $post->image) !!}"
                        src="{!! url('storage/'.  $post->image) !!}"
                        alt="{{ $post->title }}">
                </a>
            </div><!-- /.feature-post -->
            <div class="main-post main-post-sm">
                <h3 class="entry-title"><strong><a
                            href="{{ route('customer.post.detail', $post->slug) }}">{{ $post->title }}</a></strong></h3>
                <div class="entry-meta">
                    <p style="font-size: 14px;overflow: hidden; -webkit-line-clamp: 1; display: -webkit-box; -webkit-box-orient: vertical;margin-bottom: 5px;">
                        <span class="author">
                            <a rel="nofollow" href="{{ route('customer.post.detail', $post->slug) }}">
                            {{ $post->category->name }}
                            </a>
                        </span>
                    </p>
                </div>
            </div><!-- /.main-post -->
        </div><!-- /.entry-border -->
    </article><!-- /.entry -->
</div>
@endforeach
