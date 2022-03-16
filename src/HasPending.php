<?php

namespace Zareismail\Markable;
 

trait HasPending 
{    
    /**
     * Mark the model with the "pending" value.
     *
     * @return $this
     */
    public function asPending()
    {
        return $this->markAs($this->getPendingValue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "pending" value.
     *  
     * @return bool       
     */
    public function isPending()
    {
        return $this->markedAs($this->getPendingValue());
    }

    /**
     * Query the model's `marked as` attribute with the "pending" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopePendings($query)
    {
        return $query->mark($this->getPendingValue());
    }

    /**
     * Set the value of the "marked as" attribute as "pending" value.
     * 
     * @return $this
     */
    public function setPending()
    {
        return $this->setMarkedAs($this->getPendingValue());
    }

    /**
     * Get the value of the "pending" mark.
     *
     * @return string
     */
    public function getPendingValue()
    {
        return defined('static::PENDING_VALUE') ? static::PENDING_VALUE : 'pending';
    }
}
