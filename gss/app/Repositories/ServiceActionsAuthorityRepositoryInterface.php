<?php

namespace App\Repositories;

interface ServiceActionsAuthorityRepositoryInterface
{
    public function getAll();

    public function getByServiceActionId($serviceActionId);

    public function getUnapproved();

    public function getApproved();

    public function getByAuthorityId($authorityId);

    public function getByAuthorityName($authorityName);

    public function getApprovedByAuthorityName($authorityName);

    public function getUnApprovedByAuthorityName($authorityName);

    public function checkIfApprovedByAuthorityName($serviceActionId, $authorityName);

}
