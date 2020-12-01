<?php

namespace App\Policies;

use App\Conversation;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    public function before(Admin $admin)
    {
        if ($admin->id === 1) {
            return true;
        }
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(Admin $admin, Conversation $conversation)
    {
        return $conversation->admin->is($admin);
    }
}
