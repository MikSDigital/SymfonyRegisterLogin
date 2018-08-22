<?php
/**
 * Created by Jérôme Brechoire
 * Email : brechoire.j@gmail.com
 * Date: 21/08/2018
 */

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * Class RegisterType
 * @package App\Form
 */
class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array(
                'label' => 'Username',
                'required' => true,
                'constraints' => array(
                    new Length(array(
                        'min' => 3,
                        'minMessage' => 'The user name must be at least 3 characters long',
                        'max' => 15,
                        'maxMessage' => 'The user name must be 15 characters maximum'
                    )),
                    new NotBlank(array(
                        'message' => 'Name required'
                    )),
                    new NotNull(array(
                        'message' => 'Name required'
                    ))
                )
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'required' => true,
                'constraints' => array(
                    new Email(array(
                        'message' => 'The email address is invalid',
                        'checkMX' => true
                    )),
                    new NotBlank(array(
                        'message' => 'Email required'
                    )),
                    new NotNull(array(
                        'message' => 'Email required'
                    ))
                )
            ))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat password'),
                'invalid_message' => 'Passwords are not identical',
                'required' => true,
                'constraints' => array(
                    new Length(array(
                        'min' => 6,
                        'minMessage' => 'Password must be at least 6 characters long',
                        'max' => 255,
                        'maxMessage' => 'Password must be 255 characters maximum'
                    )),
                    new NotBlank(array(
                        'message' => 'Password required'
                    )),
                    new NotNull(array(
                        'message' => 'Password required'
                    ))
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}