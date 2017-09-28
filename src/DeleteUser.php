<?php

namespace Yosmy\Uniqueness;

use MongoDB\DeleteResult;

/**
 * @di\service()
 */
class DeleteUser
{
    /**
     * @var ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param ManageUserCollection $manageCollection
     */
    public function __construct(ManageUserCollection $manageCollection)
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $id
     *
     * @throws NonexistentUserException
     */
    public function delete(string $id)
    {
        /** @var DeleteResult $result */
        $result = $this->manageCollection->deleteOne([
            '_id' => $id
        ]);

        if ($result->getDeletedCount() === 0) {
            throw new NonexistentUserException();
        }
    }
}
