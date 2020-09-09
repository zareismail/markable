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
        return $this->markAs($this->getDraftVlaue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "draft" value.
     * 
     * @param  string $value 
     * @return bool       
     */
    public function isDraft()
    {
        return $this->markedAs($this->getDraftVlaue());
    }

    /**
     * Query the model's `marked as` attribute with the "draft" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeDrafts($query)
    {
        return $this->mark($this->getDraftVlaue());
    }

    /**
     * Set the value of the "marked as" attribute as "draft" value.
     * 
     * @return $this
     */
    public function setDraft()
    {
        return $this->setMarkedAs($this->getDraftVlaue());
    }

    /**
     * Get the value of the "draft" mark.
     *
     * @return string
     */
    public function getDraftVlaue()
    {
        return defined('static::DRAFT_VALUE') ? static::DRAFT_VALUE : 'draft';
    }
}
