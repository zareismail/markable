<?php

namespace Zareismail\Markable;
 

trait HasDraft 
{    
    /**
     * Mark the model with the "draft" value.
     *
     * @return $this
     */
    public function asDraft()
    {
        return $this->markAs($this->getDraftValue());
    } 

    /**
     * Alias of "isDrafted".
     * 
     * @param  string $value 
     * @return bool       
     */
    public function isDraft()
    {
        return $this->isDrafted();
    }

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "draft" value.
     * 
     * @param  string $value 
     * @return bool       
     */
    public function isDrafted()
    {
        return $this->markedAs($this->getDraftValue());
    }

    /**
     * Query the model's `marked as` attribute with the "draft" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeDrafts($query)
    {
        return $this->mark($this->getDraftValue());
    }

    /**
     * Set the value of the "marked as" attribute as "draft" value.
     * 
     * @return $this
     */
    public function setDraft()
    {
        return $this->setMarkedAs($this->getDraftValue());
    }

    /**
     * Get the value of the "draft" mark.
     *
     * @return string
     */
    public function getDraftValue()
    {
        return defined('static::DRAFT_VALUE') ? static::DRAFT_VALUE : 'draft';
    }
}
