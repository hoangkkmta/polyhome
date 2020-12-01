@foreach ($dataPosts as $row)
<article class="entry format-standard">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 image-blog-lg">
            <div class="feature-post">
                <a href="{{ route('customer.post.detail', $row->slug) }}">
                    <div class="entry-image">
                        <img class="lazy" src="{!! url('storage/'.  $row->image) !!}" alt="">
                    </div><!-- /.entry-image -->
                </a>
            </div><!-- /.feature-post -->
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 article-blog-lg">
            <div class="main-post">
                <h2 class="entry-title">
                    <strong>
                        <a href="{{ route('customer.post.detail', $row->slug) }}">{{ $row->title }}</a>
                    </strong>
                </h2>
                <div class="entry-meta">
                    <span class="author text-uppercase"><a style="margin: 0; font-weight: 600"
                            rel="nofollow" href="kinh-nghiem.html">{{ $row->category->name }}</a></span>
                </div>
                <div class="entry-content">
                    <p>{!! nl2br($row->content) !!}</p>
                </div><!-- /.entry-content -->
            </div><!-- /.main-post -->
        </div>
    </div>
</article>
@endforeach
