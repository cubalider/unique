<?php

namespace Yosmy;

/**
 * @di\service()
 */
class BasePickUniqueness implements PickUniqueness
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
     * @param string $id
     *
     * @return Uniqueness
     *
     * @throws NonexistentUniquenessException
     */
    public function pick(string $id): Uniqueness
    {
        /** @var Uniqueness $user */
        $user = $this->manageCollection->findOne([
            '_id' => $id
        ]);

        if ($user === null) {
            throw new BaseNonexistentUniquenessException();
        }

        return $user;
    }
}
