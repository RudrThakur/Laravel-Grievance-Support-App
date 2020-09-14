<?php


namespace App\Repositories;


use App\Authority;
use App\ServiceActionsAuthority;

class ServiceActionsAuthorityRepository implements ServiceActionsAuthorityRepositoryInterface
{
    public function getAll()
    {

        return ServiceActionsAuthority::all();

    }

    public function getByServiceActionId($serviceActionId)
    {

        return ServiceActionsAuthority::where('service_action_id', $serviceActionId)->get();

    }

    public function getUnapproved()
    {

        return ServiceActionsAuthority::where('approved', '!=', 1)->get();

    }

    public function getApproved()
    {

        return ServiceActionsAuthority::where('approved', 1)->get();

    }

    public function getByAuthorityId($authorityId)
    {

        return ServiceActionsAuthority::where('authority_id', $authorityId)->get();

    }

    public function getByAuthorityName($authorityName)
    {

        $authority = Authority::where('name', $authorityName)->first();

        return ServiceActionsAuthority::where('authority_id', $authority->id)->get();

    }

    public function getApprovedByAuthorityName($authorityName)
    {

        $authority = Authority::where('name', $authorityName)->first();

        return ServiceActionsAuthority::where('authority_id', $authority->id)
            ->where('approved', 1)->get();
    }

    public function getUnApprovedByAuthorityName($authorityName)
    {

        $authority = Authority::where('name', $authorityName)->first();


        return ServiceActionsAuthority::where('authority_id', $authority->id)
            ->where('approved', '!=', 1)->get();

    }

    public function checkIfApprovedByAuthorityName($serviceActionId, $authorityName)
    {

        $authority = Authority::where('name', $authorityName)->first();

        $serviceActionsAuthority = ServiceActionsAuthority::where('authority_id', $authority->id)
            ->where('service_action_id', $serviceActionId)
            ->where('approved', 1)->first();

        return $serviceActionsAuthority ? true : false;
    }
}
