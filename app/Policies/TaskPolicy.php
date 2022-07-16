<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * check if the authenticated user can delete the task instance.
     *@param User $user
     *@param Task $task
     * @return bool
     */
    public function destroy(User $user, Task $task)
    {
       return $user->id===$task->user_id;
    }
}
