<?php

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**

 * @author Akoh Ojochuma Victor <akoh.chuma@gmail.com>
 */




class NoticeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
	

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // By default, form fields include the 'required' attribute, which enables
        // the client-side form validation. This means that you can't test the
        // server-side validation errors from the browser. To temporarily disable
        // this validation, set the 'required' attribute to 'false':
        //
        //     $builder->add('content', null, array('required' => false));

        $builder
        ->add('title', 'textarea', array('label' => 'Heading',
        		'attr' => array('rows' => 1, 'cols' => 65),
        ))

        ->add('detail', 'textarea', array(
            'attr' => array('rows' => 3, 'cols' => 65),
        		'label' => '  Detail',
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
            'data_class' => 'AppBundle\Entity\Notice',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_Notice';
    }
}
