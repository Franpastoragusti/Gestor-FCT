<?php

namespace UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 4,
     *      max = 32,
     *      minMessage = "El campo nombre de usuario debe tener como mínimo {{ limit }} carácteres",
     *      maxMessage = "El campo nombre de usuario debe tener como máximo {{ limit }} carácteres"
     * )
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "El email '{{ value }}' no tiene el formato de email correcto.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=64)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[A-Za-z0-9]/",
     *     match=false,
     *     message="Tu contraseña debe contener al menos una mayúscula y un número además de minúsculas"
     * )
     * @Assert\Length(
     *      min = 8,
     *      minMessage = "El campo contraseña debe tener como mínimo {{ limit }} carácteres"
     * )
     */
    private $password;

    /**
    * @Assert\NotBlank()
    * @Assert\Regex(
    *     pattern="/[A-Za-z0-9]/",
    *     match=false,
    *     message="Tu contraseña debe contener al menos una mayúscula y un número además de minúsculas"
    * )
    * @Assert\Length(
    *      min = 8,
    *      minMessage = "El campo contraseña debe tener como mínimo {{ limit }} carácteres"
    * )
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }


    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles()
    {
      return array('ROLE_USER');
    }

    public function eraseCredentials(){}
}
