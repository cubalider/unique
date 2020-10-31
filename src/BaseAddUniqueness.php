<?php

namespace Yosmy;

/**
 * @di\service()
 */
class BaseAddUniqueness implements AddUniqueness
{
    /**
     * @var ManageUniquenessCollection
     */
    private $manageCollection;

    /**
     * @param ManageUniquenessCollection $manageCollection
     */
    public function __construct(
        ManageUniquenessCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @return string The user id
     */
    public function add(): string
    {
        $user = uniqid();

        $this->manageCollection->insertOne([
            '_id' => $user
        ]);

        return $user;
    }
}