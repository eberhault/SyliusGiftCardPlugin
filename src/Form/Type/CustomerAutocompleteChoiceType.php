<?php

declare(strict_types=1);

namespace Setono\SyliusGiftCardPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\BaseEntityAutocompleteType;

#[AsEntityAutocompleteField(
    route: 'sylius_admin_entity_autocomplete'
)]
final class CustomerAutocompleteChoiceType extends AbstractType
{
    public function __construct(
        private readonly string $customerClass,
    ) {
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'class' => $this->customerClass,
            'placeholder' => 'Choose a Customer',
            'choice_label' => 'email',
            'searchable_fields' => ['email'],
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'setono_sylius_gift_card_customer_autocomplete_choice';
    }

    public function getParent(): string
    {
        return BaseEntityAutocompleteType::class;
    }
}
