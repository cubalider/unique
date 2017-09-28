<?php

namespace Yosmy\Uniqueness\Dev;

use Yosmy\Uniqueness;

/**
 * @di\service()
 */
class PurgeUsers
{
    /**
     * @var Uniqueness\ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param Uniqueness\ManageUserCollection $manageCollection
     */
    public function __construct(
        Uniqueness\ManageUserCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     */
    public function purge()
    {
        $this->manageCollection->drop([
            'typeMap' => [
                'root' => 'array'
            ]
        ]);
    }
}
