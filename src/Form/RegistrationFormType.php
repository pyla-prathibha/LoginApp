<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('email', EmailType::class, [
'constraints' => [
new NotBlank(['message' => 'Please enter an email']),
],
])
->add('plainPassword', PasswordType::class, [
'mapped' => false,
'constraints' => [
new NotBlank(['message' => 'Please enter a password']),
new Length([
'min' => 6,
'minMessage' => 'Your password should be at least {{ limit }} characters',
'max' => 4096,
]),
],
])
->add('role', ChoiceType::class, [
'mapped' => false,
'choices' => [
'Admin' => 'ROLE_ADMIN',
'Participant' => 'ROLE_PARTICIPANT',
],
'expanded' => false,
'multiple' => false,
'label' => 'Choose your role',
])
->add('agreeTerms', CheckboxType::class, [
'mapped' => false,
'constraints' => [
new NotBlank(['message' => 'You must agree to our terms']),
],
]);
}

public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => User::class,
]);
}
}
