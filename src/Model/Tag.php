<?php

namespace App\Model;

class Tag
{
    protected int $id;
    protected string $name;
    protected int $type_id;

    public function __construct($id, $name, $type_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type_id = $type_id;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type_id
     *
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @param int $type_id
     *
     * @return self
     */
    public function setTypeId(int $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }
}
