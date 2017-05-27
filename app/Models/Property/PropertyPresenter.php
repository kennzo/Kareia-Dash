<?php
/**
 * SafeAndSecureReturns.com
 * @copyright REI Network, L.P. (c) 2016
 */

namespace App\Models\Property;

use App\Models\State\State;
use Laracasts\Presenter\Presenter;

/**
 * Class PropertyPresenter
 *
 * Handles presenting different data and names for this entity
 *
 * @package App\Models\Property
 */
class PropertyPresenter extends Presenter
{
    /**
     * Gets back the full address in format:
     * - XXXX StreetName, City, State, Zip
     *
     * @return string
     */
    public function fullAddress()
    {
        $state = State::find($this->state_id);

        return $this->street_address . ', ' . $this->city . ', ' . $state->name . ', ' . $this->zip;
    }
}
