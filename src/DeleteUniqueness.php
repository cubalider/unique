<?php

namespace Yosmy;

/**
 * @di\service()
 */
class DeleteUniqueness
{
    /**
     * @var ManageUniquenessCollection
     */
    private $manageCollection;

    /**
     * @param ManageUniquenessCollection $manageCollection
     */
    public function __construct(ManageUniquenessCollection $manageCollection)
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $user
     */
    public function delete(
        string $user
    ) {
        $this->manageCollection->deleteOne([
            '_id' => $user
        ]);
    }
}
