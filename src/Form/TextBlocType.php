<?php

namespace App\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use App\Entity\TextBloc;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TextBlocType extends CmsBasicBlocType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       parent::buildForm($builder, $options);

       $builder->add('translations', TranslationsType::class, [
           'block_name' => 'text_bloc_translation',
           'label' => false,
           'fields' => [
               'content' => [
                   'field_type' => CKEditorType::class,
                   'label' => 'cms.form.text_block.content',
                   'config_name' => 'simple',
                   ]
           ]
       ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TextBloc::class,
        ]);
    }
}
