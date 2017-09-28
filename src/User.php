<?php

namespace Yosmy\Uniqueness;

use MongoDB\Model\BSONDocument;

class User extends BSONDocument
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet('id');
    }

    /**
     * {@inheritdoc}
     */
    public function bsonUnserialize(array $data)
    {
        $data['id'] = $data['_id'];
        unset($data['_id']);

        parent::bsonUnserialize($data);
    }
}
