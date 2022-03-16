<?php

namespace Zareismail\Markable;
 

trait Progressive 
{    
    /**
     * Mark the model with the "inprogress" value and save it.
     *
     * @return $this
     */
    public function inprogress()
    {
        return tap($this->asInprogress(), function() {
            $this->save();
        });
    } 

    /**
     * Mark the model with the "inprogress" value.
     *
     * @return $this
     */
    public function asInprogress()
    {
        return $this->markAs($this->getInprogressValue());
    } 

    /**
     * Alias of "isInprogress".
     * 
     * @return bool       
     */
    public function progressing()
    {
        return $this->isInprogress();
    }

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "inprogress" value.
     * 
     * @return bool       
     */
    public function isInprogress()
    {
        return $this->markedAs($this->getInprogressValue());
    }

    /**
     * Query the model's `marked as` attribute with the "inprogress" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeInprogresses($query)
    {
        return $query->mark($this->getInprogressValue());
    }

    /**
     * Set the value of the "marked as" attribute as "inprogress" value.
     * 
     * @return $this
     */
    public function setInprogress()
    {
        return $this->setMarkedAs($this->getInprogressValue());
    }

    /**
     * Get the value of the "inprogress" mark.
     *
     * @return string
     */
    public function getInprogressValue()
    {
        return defined('static::INPROGRESS_VALUE') ? static::INPROGRESS_VALUE : 'inprogress';
    }
}
