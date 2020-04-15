<?php

namespace Zareismail\Markable;
 

trait HasReview 
{    
    /**
     * Mark the model with the "review" value.
     *
     * @return $this
     */
    public function asReview()
    {
        return $this->markAs($this->getReviewVlaue());
    } 

    /**
     * Determine if the value of the model's "marked as" attribute is equal to the "review" value.
     *  
     * @return bool       
     */
    public function isReview()
    {
        return $this->markedAs($this->getReviewVlaue());
    }

    /**
     * Query the model's `marked as` attribute with the "review" value.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query  
     * @return \Illuminate\Database\Eloquent\Builder       
     */
    public function scopeReviews($query)
    {
        return $this->mark($this->getReviewVlaue());
    }

    /**
     * Set the value of the "marked as" attribute as "review" value.
     * 
     * @return $this
     */
    public function setReview()
    {
        return $this->setMarkedAs($this->getReviewVlaue());
    }

    /**
     * Get the value of the "review" mark.
     *
     * @return string
     */
    public function getReviewVlaue()
    {
        return static::REVIEW_VALUE ?? 'review';
    }
}
