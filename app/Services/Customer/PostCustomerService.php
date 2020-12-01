<?php
namespace App\Services\Customer;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\Service;
use App\Models\TimeSchedule;
use App\Traits\WebResponseTrait;
use App\Models\Post;
use Auth;
use App\Models\Building;

class PostCustomerService
{
    use WebResponseTrait;

    public function listPost($request)
    {
        $builder = Post::where(function ($query) use ($request) {
            if ($request->title) $query->where('title', 'like', '%'.$request->title.'%');
        });

        $dataPosts = $builder->where('status', STATUS_POST_PUBLIC)
                        ->orderBy('id', 'desc')
                        ->paginate(5);

        $dataPosts->appends(request()->query());

        $dataCategories = Category::all();
        $dataPostHots = Post::all()->sortByDesc('created_at')->take(6);

        return view(
            'customer::post.index',
            [
                'dataPosts' => $dataPosts,
                'dataCategories' => $dataCategories,
                'dataPostHots' => $dataPostHots,
            ],
        );
    }

    public function detailPost($slug)
    {

        $data = Post::where('slug', $slug)->where('status', STATUS_POST_PUBLIC )->first();
        if (!$data) {
            abort(404);
        }
        $dataPosts = Post::where('status', STATUS_POST_PUBLIC)
                    ->orderBy('id', 'desc')
                    ->paginate(8);
        $data['building'] = Building::join('rooms', 'buildings.id', 'rooms.building_id')
                            ->select('buildings.*')
                            ->distinct()
                            ->orderBy('buildings.id', 'desc')
                            ->paginate(8);
        $dataComments = Comment::where('post_id', $data->id)->where('status', STATUS_POST_PUBLIC)->get();
        return view(
            'customer::post.show',
            [
                'data' => $data,
                'dataPosts' => $dataPosts,
                'dataComments' => $dataComments,
            ]
        );
    }

    public function sendComment($request, $slug)
    {
        $data = $request->only(
            'content',
            'title',
        );

        $post = Post::where('slug', $slug)->first();
        $data['title'] = $request->title;
        $data['status'] = STATUS_COMMENT_PUBLIC;
        $data['post_id'] = $post->id;
        $data['customer_id'] = auth()->user()->id;
        Comment::create($data);
        return redirect()->route('customer.post.detail', $post->slug)->with('status', 'Bình luận thành công');
    }


}
