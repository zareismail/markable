<?php

namespace Zareismail\Markable;
 

trait Rejectable 
{    
    /**
     * Mark the model with the "rejected" value and save it.
     *
     * @return $this
     */
    public function reject()
    {
        return tap($this->asRejected(), function() {
            $this->save();
        });
    } 

    /**
     * Mark the model with the "rejected" value.
     *
     * @return $this
     */
    public function asRejected()
    {
        return $this->markAs($this->getRejectedValue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "rejected" value.
     * 
     * @return bool       
     */
    public function isRejected()
    {
        return $this->markedAs($this->getRejectedValue());
    }

    /**
     * Query the model's `marked as` attribute with the "rejected" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeRejected($query)
    {
        return $query->mark($this->getRejectedValue());
    }

    /**
     * Set the value of the "marked as" attribute as "rejected" value.
     * 
     * @return $this
     */
    public function setRejected()
    {
        return $this->setMarkedAs($this->getRejectedValue());
    }

    /**
     * Get the value of the "rejected" mark.
     *
     * @return string
     */
    public function getRejectedValue()
    {
        return defined('static::ACCEPTED_VALUE') ? static::ACCEPTED_VALUE : 'rejected';
    }
}
