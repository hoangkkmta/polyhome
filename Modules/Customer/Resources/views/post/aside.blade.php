<div class="sidebar" id="sidebar">
    <div class="widget widget-sibscribe">
        <form action="{{ route('customer.post.list') }}">
            <h5 class="title"><strong>Tìm kiếm</strong></h5>
            <input type="text" name="s" value="{{ request()->title }}" placeholder="Nhập từ khóa...">
            <button type="submit" class="flat-button bg-theme">Tìm kiếm</button>
        </form>
    </div>
    <div class="widget widget-recent-post style1">
        <h5 class="widget-title"><strong>Bài viết được xem nhiều nhất</strong></h5>
        <ul class="post-news clearfix">
            @foreach ($dataPosts as $row)
                <li>
                    <div class="thumb">
                        <a href="{{ route('customer.post.detail', $row->slug) }}">
                            <img class="lazy" src="{!! url('storage/'.  $row->image) !!}" alt="image">
                        </a>
                    </div>
                    <div class="text">
                        <h4>
                            <a href="{{ route('customer.post.detail', $row->slug) }}">
                                <strong>
                                    {{ $row->title }}
                                </strong>
                            </a>
                        </h4>
                        <p><i class="fa fa-clock-o"></i> {{ $row->created_at->format('d/m/Y') }} </p>
                    </div>
                </li>
            @endforeach
        </ul><!-- /.post-news -->
    </div><!-- /.widget .widget-recent-post style1 -->
</div><!-- /.sidebar -->

