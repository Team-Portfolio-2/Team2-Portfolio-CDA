<?php

namespace App\Model;

class Education
{

    protected int $id;
    protected string $title;
    protected string $school;
    protected string $year;
    protected ?string $description;

    public function __construct($id, $title, $school, $year, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->school = $school;
        $this->year = $year;
        $this->description = $description;
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
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of school
     *
     * @return string
     */
    public function getSchool(): string
    {
        return $this->school;
    }

    /**
     * Set the value of school
     *
     * @param string $school
     *
     * @return self
     */
    public function setSchool(string $school): self
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get the value of year
     *
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @param string $year
     *
     * @return self
     */
    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param ?string $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
