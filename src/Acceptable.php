<?php

namespace Zareismail\Markable;
 

trait Acceptable 
{    
    /**
     * Mark the model with the "accepted" value and save it.
     *
     * @return $this
     */
    public function accept()
    {
        return tap($this->asAccepted(), function() {
            $this->save();
        });
    } 

    /**
     * Mark the model with the "accepted" value.
     *
     * @return $this
     */
    public function asAccepted()
    {
        return $this->markAs($this->getAcceptedValue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "accepted" value.
     * 
     * @return bool       
     */
    public function isAccepted()
    {
        return $this->markedAs($this->getAcceptedValue());
    }

    /**
     * Query the model's `marked as` attribute with the "accepted" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeAccepted($query)
    {
        return $query->mark($this->getAcceptedValue());
    }

    /**
     * Set the value of the "marked as" attribute as "accepted" value.
     * 
     * @return $this
     */
    public function setAccepted()
    {
        return $this->setMarkedAs($this->getAcceptedValue());
    }

    /**
     * Get the value of the "accepted" mark.
     *
     * @return string
     */
    public function getAcceptedValue()
    {
        return defined('static::ACCEPTED_VALUE') ? static::ACCEPTED_VALUE : 'accepted';
    }
}
