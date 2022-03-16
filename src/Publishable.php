<?php

namespace Zareismail\Markable;
 

trait Publishable 
{    
    /**
     * Mark the model with the "published" value.
     *
     * @return $this
     */
    public function asPublished()
    {
        return $this->markAs($this->getPublishedValue());
    } 

    /**
     * Mark the model with the "published" value and save it.
     *
     * @return $this
     */
    public function publish()
    {
        $this->asPublished()->save();

        return $this;
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "published" value.
     * 
     * @param  string $value 
     * @return bool       
     */
    public function isPublished()
    {
        return $this->markedAs($this->getPublishedValue());
    }

    /**
     * Query the model's `marked as` attribute with the "published" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopePublishes($query)
    {
        return $query->mark($this->getPublishedValue());
    }

    /**
     * Set the value of the "marked as" attribute as "published" value.
     * 
     * @return $this
     */
    public function setPublished()
    {
        return $this->setMarkedAs($this->getPublishedValue());
    }

    /**
     * Get the value of the "published" mark.
     *
     * @return string
     */
    public function getPublishedValue()
    {
        return defined('static::PUBLISHED_VALUE') ? static::PUBLISHED_VALUE : 'published';
    }
}
