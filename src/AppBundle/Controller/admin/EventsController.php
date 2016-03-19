<?php

namespace AppBundle\Controller\admin;

use AppBundle\Form\Type\EventType;
use AppBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EventsController extends Controller
 {
	
	
    /**
     * @Route("/admin/event")
     */
    public function createAction(Request $request)
    {
    	
     $Event = $this->getDoctrine() 
         ->getRepository('AppBundle:Event');
     $allEvent = $Event->findRescentEvents(3);
        
			    //
     
     $event = new Event(); 
     $form = $this->createForm(new EventType(), $event);
    
      
        $form->handleRequest($request);
       
      if ($form->isValid())
       { 
        	//exit('form was valid');
       	$em = $this->getDoctrine()->getManager(); 
       	$em->persist($event);
       	 $em->flush();
      }
     

  return $this->render('admin/articles/event.html.twig', array( 'form' => $form ->createView(),'event' => $allEvent, ));
       
       
    	    
     }
    


/**
 * @Route("admin/event/edit/{id}")
 */

public function editAction($id){ 
	
    $em = $this->getDoctrine()->getEntityManager();
    $event  = $em->getRepository('AppBundle:Event')->find($id);
    $allEvent =$em->getRepository('AppBundle:Event')->findRescentEvents('3');
   
		
 $request = $this->get('request');

    if (is_null($id)) {
        $postData = $request->get('event');
        $id = $postData['id'];
    }

    $form = $this->createForm(new EventType(), $event);

    if ($request->getMethod() == 'POST') {
        $form->bind($request);

        if ($form->isValid()) {
             	$em = $this->getDoctrine()->getManager(); 
       	  $em->persist($event);
       	 $em->flush();

            return $this->redirect($this->generateUrl('admin'));
        }
    }
     
 return $this->render('admin/articles/event.html.twig', array( 'form' => $form ->createView(),'event' => $allEvent, ));
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 }
