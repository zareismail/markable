<?php

namespace Zareismail\Markable;
 

trait HasArchive 
{    
    /**
     * Mark the model with the "archive" value.
     *
     * @return $this
     */
    public function asArchive()
    {
        return $this->markAs($this->getArchiveValue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "archive" value.
     *  
     * @return bool       
     */
    public function isArchive()
    {
        return $this->markedAs($this->getArchiveValue());
    }

    /**
     * Query the model's `marked as` attribute with the "archive" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeArchives($query)
    {
        return $query->mark($this->getArchiveValue());
    }

    /**
     * Set the value of the "marked as" attribute as "archive" value.
     * 
     * @return $this
     */
    public function setArchive()
    {
        return $this->setMarkedAs($this->getArchiveValue());
    }

    /**
     * Get the value of the "archive" mark.
     *
     * @return string
     */
    public function getArchiveValue()
    {
        return defined('static::ARCHIVE_VALUE') ? static::ARCHIVE_VALUE : 'archive';
    }
}
