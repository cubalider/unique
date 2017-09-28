<?php

namespace Yosmy\Uniqueness;

/**
 * @di\service()
 */
class CollectUsers
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
     * @param string[] $ids
     * @param int      $skip
     * @param int      $limit
     *
     * @return Users
     */
    public function collect(
        ?array $ids,
        ?int $skip,
        ?int $limit
    ) {
        $criteria = [];

        if ($ids !== null) {
            $criteria['_id'] = ['$in' => $ids];
        }

        $options = [];

        if ($skip !== null && $limit !== null) {
            $options['skip'] = $skip;

            $options['limit'] = $limit;
        }

        $cursor = $this->manageCollection->find(
            $criteria,
            $options
        );

        return new Users($cursor);
    }
}
