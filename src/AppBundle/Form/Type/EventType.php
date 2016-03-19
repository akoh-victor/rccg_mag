<?php

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Defines the form used to create and manipulate blog comments. Although in this
 * case the form is trivial and we could build it inside the controller, a good
 * practice is to always define your forms as classes.
 * See http://symfony.com/doc/current/book/forms.html#creating-form-classes
 *
 * @author Akoh Ojochuma Victor <akoh.chuma@gmail.com>
 */




class EventType extends AbstractType
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
        ->add('theme', null, array('label' => 'Theme',
        		'attr' => array('rows' => 20),
        		'attr' => array('cols' => 65),
        ))
        
        ->add('host', 'text', array('label' => 'Host'))
        ->add('category','entity', array(
        'class'=>'AppBundle:Category',
        'property'=>'name', 
        
        ))
        ->add('priority','entity', array(
        		'class'=>'AppBundle:Priority',
        		'property'=>'name',
        
        ))
        
      

        ->add('venue', 'textarea', array(
        		'attr' => array('rows' => 20),
        		'attr' => array('cols' => 65),
        		'label' => 'Venue',
        ))
        ->add('ministers', 'textarea', array(
        		'attr' => array('rows' => 20),
        		'attr' => array('cols' => 65),
        		'label' => 'Minister(s)',
        ))
        ->add('guest', 'textarea', array(
        		'attr' => array('rows' => 20),
        		'attr' => array('cols' => 65),
        		'label' => 'Special Guest(s)',
        ))
        ->add('date', 'date', array(
        	
        		'label' => 'Date',
        ))
        ->add('expired', 'number', array(
        		 
        		'label' => 'Expired',
        ))
        ->add('time', 'time', array(
        		
        		'label' => 'Time',
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
            'data_class' => 'AppBundle\Entity\Event',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        // Best Practice: use 'app_' as the prefix of your custom form types names
        // see http://symfony.com/doc/current/best_practices/forms.html#custom-form-field-types
        return 'app_event';
    }
}
