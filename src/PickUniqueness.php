<?php

namespace Yosmy;

interface PickUniqueness
{
    /**
     * @param string $id
     *
     * @return Uniqueness
     *
     * @throws NonexistentUniquenessException
     */
    public function pick(string $id): Uniqueness;
}
