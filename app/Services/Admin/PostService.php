<?php
namespace App\Services\Admin;

use App\Models\Category;
use App\Traits\WebResponseTrait;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Gate;

class PostService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Post::where(function ($query) use ($request) {
            if ($request->name) $query->where('title', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'admin::post.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        $dataCategories = Category::where('status', STATUS_POST_PUBLIC )->get();
        return view(
            'admin::post.create',
            [
                'dataCategories' => $dataCategories,
            ]
        );
    }

    public function store($request)
    {
        $data = $request->only(
            'title',
            'slug',
            'content',
            'image',
            'like',
            'status',
            'author_id',
            'category_id',
        );
        $data['slug'] = Str::slug($request->title, '-');
        $data['image'] = $request->file('image')->store('post', 'public');
        $data['like'] = 0;
        $data['author_id'] = auth()->user()->id;
        // dd($data);
        $post = Post::create($data);
        return $this->returnSuccessWithRoute('admin.bai-viet.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = Post::find($id);
        $dataCategories = Category::all();
        return view(
            'admin::post.edit',
            [
                'data' => $data,
                'dataCategories' => $dataCategories,
            ]
        );
    }

    public function update($request, $id)
    {
        $post = Post::find($id);
        $data=$request->all();
        if(empty($post)) {
            return $this->returnFailedWithRoute('admin.bai-viet.index', __('messages.data_update_failed'));
        } else {
            if (empty($request->file())) {
                $data['image'] = $post->image;
            }else {
                $data['image'] = $request->file('image')->store('post', 'public');
            }
            $post->update($data);
            return $this->returnSuccessWithRoute('admin.bai-viet.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('admin.bai-viet.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = Post::onlyTrashed()->get();
        return view(
            'admin::post.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('admin.bai-viet.listSoftDelete', __('messages.data_restore_success'));
    }

}
