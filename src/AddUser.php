<?php

namespace Yosmy\Uniqueness;

use Yosmy\Mongo\DuplicatedKeyException;
use LogicException;

/**
 * @di\service()
 */
class AddUser
{
    /**
     * @var ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param ManageUserCollection $manageCollection
     */
    public function __construct(
        ManageUserCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @return string The id
     */
    public function add()
    {
        $id = uniqid();

        try {
            $this->manageCollection->insertOne([
                '_id' => $id
            ]);
        } catch (DuplicatedKeyException $e) {
            throw new LogicException();
        }

        return $id;
    }
}