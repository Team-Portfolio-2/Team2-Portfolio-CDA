<?php

namespace App\Model;

class Screenshot
{
    protected int $id;
    protected string $url;
    protected string $caption;
    protected int $project_id;

    public function __construct($id, $url, $caption, $project_id)
    {
        $this->id = $id;
        $this->url = $url;
        $this->caption = $caption;
        $this->project_id = $project_id;
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
     * Get the value of url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of caption
     *
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * Set the value of caption
     *
     * @param string $caption
     *
     * @return self
     */
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get the value of project_id
     *
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->project_id;
    }

    /**
     * Set the value of project_id
     *
     * @param int $project_id
     *
     * @return self
     */
    public function setProjectId(int $project_id): self
    {
        $this->project_id = $project_id;

        return $this;
    }
}
