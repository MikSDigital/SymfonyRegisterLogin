<?php
/**
 * Created by Jérôme Brechoire
 * Email : brechoire.j@gmail.com
 * Date: 21/08/2018
 */

namespace App\Service;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class UserService
 * @package App\Service
 */
class UserService
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var FormFactoryInterface
     */
    private $form;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passEncoder;

    /**
     * @var AuthenticationUtils
     */
    private $loginUtils;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $secuCheck;

    /**
     * @var TokenStorageInterface
     */
    private $security;

    /**
     * UserService constructor.
     * @param EntityManagerInterface $doctrine
     * @param FormFactoryInterface $form
     * @param UserPasswordEncoderInterface $passEncoder
     * @param AuthenticationUtils $loginUtils
     * @param AuthorizationCheckerInterface $secuCheck
     * @param TokenStorageInterface $security
     */
    public function __construct(EntityManagerInterface $doctrine, FormFactoryInterface $form, UserPasswordEncoderInterface $passEncoder, AuthenticationUtils $loginUtils, AuthorizationCheckerInterface $secuCheck, TokenStorageInterface $security)
    {
        $this->doctrine = $doctrine;
        $this->form = $form;
        $this->passEncoder = $passEncoder;
        $this->loginUtils = $loginUtils;
        $this->secuCheck = $secuCheck;
        $this->security = $security;
    }

    /**
     * User registration form
     * If no user in the database, then the first registered will be admin
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function registerUser(Request $request)
    {
        $count = $this->doctrine->getRepository(User::class)->findAll();
        $user = new User();

        $form = $this->form->create(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            if (count($count) == ""){
                $user->setRoles(['ROLE_ADMIN']);
            }

            $password = $this->passEncoder->encodePassword(
                $user,
                $user->getPassword()
            );

            $user->setPassword($password);
            $this->doctrine->persist($user);
            $this->doctrine->flush();
        }

        return $form;

    }



}