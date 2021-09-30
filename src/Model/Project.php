<?php

namespace App\Model;

use DateTime;

class Project
{
    protected int $id;
    protected string $name;
    protected string $company;
    protected string $logo_company;
    protected string $description;
    protected ?string $website;
    protected DateTime $start;
    protected DateTime $end;

    public function __construct($id, $name, $company, $logo_company, $description, $website, $start, $end)
    {
        $this->id = $id;
        $this->name = $name;
        $this->company = $company;
        $this->logo_company = $logo_company;
        $this->description = $description;
        $this->website = $website;
        $this->start = $start;
        $this->end = $end;
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
     * Get the value of company
     *
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @param string $company
     *
     * @return self
     */
    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of logo_company
     *
     * @return string
     */
    public function getLogoCompany(): string
    {
        return $this->logo_company;
    }

    /**
     * Set the value of logo_company
     *
     * @param string $logo_company
     *
     * @return self
     */
    public function setLogoCompany(string $logo_company): self
    {
        $this->logo_company = $logo_company;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of website
     *
     * @return ?string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * Set the value of website
     *
     * @param ?string $website
     *
     * @return self
     */
    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get the value of start
     *
     * @return DateTime
     */
    public function getStart(): DateTime
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @param DateTime $start
     *
     * @return self
     */
    public function setStart(DateTime $start): self
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of end
     *
     * @return DateTime
     */
    public function getEnd(): DateTime
    {
        return $this->end;
    }

    /**
     * Set the value of end
     *
     * @param DateTime $end
     *
     * @return self
     */
    public function setEnd(DateTime $end): self
    {
        $this->end = $end;

        return $this;
    }
}
