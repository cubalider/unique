<?php

namespace Yosmy;

use Yosmy\Mongo;

class BaseUniqueness extends Mongo\Document implements Uniqueness
{
    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->offsetGet('_id');
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): object
    {
        $data = parent::jsonSerialize();

        $data->user = $data->_id;

        unset($data->_id);

        return $data;
    }
}
