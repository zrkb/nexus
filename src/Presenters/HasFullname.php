<?php

namespace Nexus\Presenters;

trait HasFullname
{
    public function getInitialsAttribute()
    {
        $firstname = $this->firstname ?? 'N';
        $lastname = $this->lastname ?? 'N';

        return $firstname[0] . $lastname[0];
    }

    public function getFullnameAttribute()
    {
        return implode(' ', [$this->firstname, $this->lastname]);
    }

    public function getAccountAgeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getLastModifiedAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getLastnameAttribute()
    {
        return $this->attributes['lastname'] ?? '';
    }
}
