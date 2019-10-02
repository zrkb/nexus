<?php

namespace Nexus\Presenters;

trait AdminPresenter
{
    public function getInitialsAttribute()
    {
        return $this->firstname[0] ?? 'X' . $this->lastname[0] ?? '';
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
}
