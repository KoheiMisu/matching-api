<?php

namespace App\Models\Support;

use App\Models\UserPermission;

trait UserPolicy
{
    /**
     * @Todo 多分team_idと照合しないとセキュリティ的に危ない
     *
     * @param string $type
     *
     * @return bool
     */
    public function judgeType(string $type): bool
    {
        $plucked = $this->userPermission->pluck('type', $type);

        if ($plucked->count() > 0) {
            return true;
        }

        return false;
    }

    public function canCreateTeam(): bool
    {
        if (!$this->judgeType(UserPermission::CAPTAIN)) {
            return false;
        }

        /** @var bool $canCreate */
        $canCreate = $this->userPermission->contains(function ($userPermission, $key) {
            if ($userPermission->team_id === null) {
                return true;
            }
        });

        return $canCreate;
    }
}
