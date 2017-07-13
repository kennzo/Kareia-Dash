<?php

namespace App\Models\Estimates\RentalEstimate;

use Laracasts\Presenter\Presenter;

/**
 * Class RentalEstimatePresenter
 *
 * Handles presenting different data and names for this entity
 *
 * @package App\Models\Estimates\RentalEstimate\RentalEstimate
 */class RentalEstimatePresenter extends Presenter
{
    /**
     * Returns a hash with adler32 algorithm for creating a new CSS
     * id to be used and referenced.
     *
     * @return string
     */
    public function convertNameToCssId()
    {
        return hash('adler32', $this->name);
    }

    public function formatArv()
    {
        return "$" . number_format($this->arv, 2);
    }

    public function formatRentalArv()
    {
        return "$" . number_format($this->rental_arv, 2);
    }
}
