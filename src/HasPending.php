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
        return $this->markAs($this->getPendingVlaue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "pending" value.
     *  
     * @return bool       
     */
    public function isPending()
    {
        return $this->markedAs($this->getPendingVlaue());
    }

    /**
     * Query the model's `marked as` attribute with the "pending" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopePendings($query)
    {
        return $this->mark($this->getPendingVlaue());
    }

    /**
     * Set the value of the "marked as" attribute as "pending" value.
     * 
     * @return $this
     */
    public function setPending()
    {
        return $this->setMarkedAs($this->getPendingVlaue());
    }

    /**
     * Get the value of the "pending" mark.
     *
     * @return string
     */
    public function getPendingVlaue()
    {
        return defined('static::PENDING_VALUE') ? static::PENDING_VALUE : 'pending';
    }
}
