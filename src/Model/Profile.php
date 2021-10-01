<?php

namespace App\Model;

class Profile
{
    protected string $first_name;
    protected string $last_name;
    protected int $gender;
    protected ?string $adress;
    protected int $cp;
    protected string $city;
    protected string $email;
    protected ?int $phone;
    protected ?string $linkedin_url;
    protected ?string $github_url;
    protected ?string $twitter_url;
    protected string $password;
    protected ?int $drive_licence;
    protected ?string $catchphrase;
    protected ?int $birthdate;

    /**
     * Get the value of first_name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @param string $first_name
     *
     * @return self
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @param string $last_name
     *
     * @return self
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of gender
     *
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @param int $gender
     *
     * @return self
     */
    public function setGender(int $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of adress
     *
     * @return ?string
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     *
     * @param ?string $adress
     *
     * @return self
     */
    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get the value of cp
     *
     * @return int
     */
    public function getCp(): int
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @param int $cp
     *
     * @return self
     */
    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     *
     * @return ?int
     */
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param ?int $phone
     *
     * @return self
     */
    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of linkedin_url
     *
     * @return ?string
     */
    public function getLinkedinUrl(): ?string
    {
        return $this->linkedin_url;
    }

    /**
     * Set the value of linkedin_url
     *
     * @param ?string $linkedin_url
     *
     * @return self
     */
    public function setLinkedinUrl(?string $linkedin_url): self
    {
        $this->linkedin_url = $linkedin_url;

        return $this;
    }

    /**
     * Get the value of github_url
     *
     * @return ?string
     */
    public function getGithubUrl(): ?string
    {
        return $this->github_url;
    }

    /**
     * Set the value of github_url
     *
     * @param ?string $github_url
     *
     * @return self
     */
    public function setGithubUrl(?string $github_url): self
    {
        $this->github_url = $github_url;

        return $this;
    }

    /**
     * Get the value of twitter_url
     *
     * @return ?string
     */
    public function getTwitterUrl(): ?string
    {
        return $this->twitter_url;
    }

    /**
     * Set the value of twitter_url
     *
     * @param ?string $twitter_url
     *
     * @return self
     */
    public function setTwitterUrl(?string $twitter_url): self
    {
        $this->twitter_url = $twitter_url;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of drive_licence
     *
     * @return ?int
     */
    public function getDriveLicence(): ?int
    {
        return $this->drive_licence;
    }

    /**
     * Set the value of drive_licence
     *
     * @param ?int $drive_licence
     *
     * @return self
     */
    public function setDriveLicence(?int $drive_licence): self
    {
        $this->drive_licence = $drive_licence;

        return $this;
    }

    /**
     * Get the value of catchphrase
     *
     * @return ?string
     */
    public function getCatchphrase(): ?string
    {
        return $this->catchphrase;
    }

    /**
     * Set the value of catchphrase
     *
     * @param ?string $catchphrase
     *
     * @return self
     */
    public function setCatchphrase(?string $catchphrase): self
    {
        $this->catchphrase = $catchphrase;

        return $this;
    }

    /**
     * Get the value of birthdate
     *
     * @return ?int
     */
    public function getBirthdate(): ?int
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @param ?int $birthdate
     *
     * @return self
     */
    public function setBirthdate(?int $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }
}
