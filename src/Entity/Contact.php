<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom ne doit pas être vide.")]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: "Le nom doit comporter au moins {{ limit }} caractères.",
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'email ne doit pas être vide.")]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide.")]

    private ?string $email = null;

    #[ORM\Column(length: 15)]
    #[Assert\NotBlank(message: "Le numéro de téléphone ne doit pas être vide.")]
    #[Assert\Length(
        min: 10,
        max: 15,
        minMessage: "Le numéro de téléphone doit comporter au moins {{ limit }} caractères.",
        maxMessage: "Le numéro de téléphone ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Vous devez écrire un sujet.")]
    #[Assert\Regex(
        pattern: '/<[^>]*>/',
        match: false,
        message: 'Le nom du sujet contient des caractères non autorisés, veuillez corriger le sujet.'
    )]
    // #[Assert\Regex(
    //     pattern: '/^\d+$/',
    //     message: "Le numéro de téléphone doit être composé uniquement de chiffres."
    // )]
    private ?string $subject = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Le message ne doit pas être vide.")]
    #[Assert\Length(
        min: 10,
        minMessage: "Le message doit comporter au moins {{ limit }} caractères."
    )]
    #[Assert\Regex(
        pattern: '/<[^>]*>/',
        match: false,
        message: 'Votre message contient des caractères non autorisés, veuillez rectifier votre message.'
    )]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
