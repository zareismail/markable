<?php

namespace Zareismail\Markable;
 

trait Completable 
{    
    /**
     * Mark the model with the "completed" value and save it.
     *
     * @return $this
     */
    public function complete()
    {
        return tap($this->asCompleted(), function() {
            $this->save();
        });
    } 

    /**
     * Mark the model with the "completed" value.
     *
     * @return $this
     */
    public function asCompleted()
    {
        return $this->markAs($this->getCompletedValue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "completed" value.
     * 
     * @return bool       
     */
    public function isCompleted()
    {
        return $this->markedAs($this->getCompletedValue());
    }

    /**
     * Query the model's `marked as` attribute with the "completed" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeCompleted($query)
    {
        return $this->mark($this->getCompletedValue());
    }

    /**
     * Set the value of the "marked as" attribute as "completed" value.
     * 
     * @return $this
     */
    public function setCompleted()
    {
        return $this->setMarkedAs($this->getCompletedValue());
    }

    /**
     * Get the value of the "completed" mark.
     *
     * @return string
     */
    public function getCompletedValue()
    {
        return defined('static::COMPLETED_VALUE') ? static::COMPLETED_VALUE : 'completed';
    }
}
