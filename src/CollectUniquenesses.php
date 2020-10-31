<?php

namespace Yosmy;

/**
 * @di\service()
 */
class CollectUniquenesses
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
     * @param string[]|null $users
     * @param int|null      $skip
     * @param int|null      $limit
     *
     * @return Uniquenesses
     */
    public function collect(
        ?array $users,
        ?int $skip,
        ?int $limit
    ): Uniquenesses {
        $criteria = [];

        if ($users !== null) {
            $criteria['_id'] = ['$in' => $users];
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

        return new Uniquenesses($cursor);
    }
}
