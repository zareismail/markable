<?php

namespace Zareismail\Markable;
 

trait Markable 
{   
    /**
     * Query the model's `marked as` attribute with the given value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query 
     * @param  string $value 
     * 
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeMark($query, $value)
    {
        return $query->markIn((array) $value);
    }

    /**
     * Query the model's `marked as` attribute with the given values.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query 
     * @param  array $value 
     * 
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeMarkIn($query, array $value)
    {
        return $query->whereIn($this->getQualifiedMarkedAsColumn(), $value);
    }

    /**
     * Mark the model's by the given value.
     *
     * @return bool
     */
    public function markAs($value)
    {
        $this->when(! $this->markedAs($value), function() use ($value) {
            $this->setMarkedAs($value)->save();
        }); 

        return $this;
    } 

    /**
     * Determine if the "marked as" attribute has the given value.
     * 
     * @param  string $value 
     * @return bool       
     */
    public function markedAs($value): bool
    {
        return $this->{$this->getMarkedAsColumn()} === $value;
    }

    /**
     * Set the value of the "marked as" attribute.
     *
     * @param  mixed  $value
     * @return $this
     */
    public function setMarkedAs($value)
    {
        $this->{$this->getMarkedAsColumn()} = $value;

        return $this; 
    }

    /**
     * Get the fully qualified "marked as" column.
     *
     * @return string
     */
    public function getQualifiedMarkedAsColumn(): string
    {
        return $this->qualifyColumn($this->getMarkedAsColumn());
    }

    /**
     * Get the name of the "marked as" column.
     *
     * @return string
     */
    public function getMarkedAsColumn()
    {
        return defined('static::MARKED_AS') ? static::MARKED_AS : 'marked_as';
    }
}
