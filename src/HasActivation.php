<?php

namespace Zareismail\Markable;
 

trait HasActivation 
{    
    /**
     * Mark the model with the "activation" value.
     *
     * @return $this
     */
    public function asActive(bool $activation = true)
    {
        return $this->markAs($this->getActivationValue($activation));
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "true" value.
     *  
     * @return bool       
     */
    public function isActive()
    {
        return $this->markedAs($this->getActivationValue());
    }

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "false" value.
     *  
     * @return bool       
     */
    public function isInactive()
    {
        return ! $this->isActive();
    }

    /**
     * Query the model's `marked as` attribute with the "activation" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query 
     * @param  bool $activation  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeActives($query, bool $activation = true)
    {
        return $query->mark($this->getActivationValue($activation));
    }

    /**
     * Query the model's `marked as` attribute with the "false" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query   
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeInactives($query)
    {
        return $this->actives(false);
    }

    /**
     * Set the value of the "marked as" attribute as "true" value.
     *
     * @param  bool $activation
     * @return $this
     */
    public function setActivation(bool $activation = true)
    {
        return $this->setMarkedAs($this->getActivationValue($activation));
    } 

    /**
     * Get the value of the "draft" mark.
     *
     * @return string
     */
    public function getActivationValue(bool $activation = true)
    {
        return (int) $activation;
    }
}
