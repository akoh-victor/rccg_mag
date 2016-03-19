<?php

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Akoh Ojochuma Victor <akoh.chuma@gmail.com>
 */




class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
	

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        //     $builder->add('content', null, array('required' => false));

        $builder
        ->add('title', null, array('label' => 'Title'))
        ->add('category','entity', array(
        'class'=>'AppBundle:Category',
        'property'=>'name',
        ))
        
        ->add('priority','entity', array(
        		'class'=>'AppBundle:Priority',
        		'property'=>'name',
        
        ))
            ->add('position','choice',array(
                'label' => 'Display Position',
                'placeholder' => 'Choose a Position',
                'choices' => array('top' => 'Top', 'right' => 'Right','xright'=>'Xtreme Right',
                    'left'=>'Left','xleft'=>'Extreme Left','more'=>'Display In More Panel'),
            ))
            ->add('slide','choice',array(
                'label' => 'Display In Slide',
                'placeholder' => 'Make a choice',
                'choices' => array('1' => 'Enable', '0' => 'Disable'),
            ))

        ->add('file', 'file', array(
            'data_class' => null,
            'required' => false,
            'label' => 'Image',
        ))

        ->add('article', 'textarea', array(

        		'attr' => array('cols' => 65,
                                 'rows' => 14),
        		'label' => 'Article',
        ))


        ->add('newsDate', 'datetime', array(
        		'label' => 'News Date',
        ))
        ->add('save', 'submit', array(
        		'label' => 'Save',
        'attr'=>array('class'=>'btn btn-md btn-info')
     
        ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\News',
        ));


    }

    /**
     * @return string
     */
    public function getName()
    {
        // Best Practice: use 'app_' as the prefix of your custom form types names
        // see http://symfony.com/doc/current/best_practices/forms.html#custom-form-field-types
        return 'app_news';
    }
}
