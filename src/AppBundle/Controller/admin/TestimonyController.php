<?php

namespace AppBundle\Controller\admin;

use AppBundle\Form\Type\TestimonyType;
use AppBundle\Entity\Testimony;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TestimonyController extends Controller
 {
	
	
    /**
     * @Route("/admin/testimony")
     */
    public function createAction(Request $request)
    {
    	
     $Testimony = $this->getDoctrine() 
         ->getRepository('AppBundle:Testimony');
     $alltestimony = $Testimony->findRescentTestimonies(1);
        
			    
     
     $testimony = new Testimony(); 
     $form = $this->createForm(new TestimonyType(), $testimony);
    
      
        $form->handleRequest($request);
       
      if ($form->isValid())
       {
           /**
            * @var Symfony\Component\HttpFoundation\File\UploadedFile $file
            */
           $file = $testimony->getImage();

           //generate file name before saving i2
           $fileName = md5(uniqid()).'.'.$file->guessExtension();

           // Move the file to the directory where brochures are stored
           $imageDir = $this->container
                   ->getParameter('kernel.root_dir').'/../web/ uploads/images/testimony';
           $file->move($imageDir, $fileName);

           $testimony->setImage($fileName);
           $testimony->setExpired(0);
       	$em = $this->getDoctrine()->getManager(); 
       	$em->persist($testimony);
       	 $em->flush();
      }
     

  return $this->render('admin/articles/testimony.html.twig', array( 'form' => $form ->createView(),'testimony' => $alltestimony, ));
       
       
    	    
     }
    


/**
 * @Route("admin/testimony/edit/{id}")
 */

public function editAction($id){ 
	
    $em = $this->getDoctrine()->getEntityManager();
    $testimony  = $em->getRepository('AppBundle:Testimony')->find($id);
    $alltestimony =$em->getRepository('AppBundle:Testimony')->findRescentTestimonies('3');
   
		
 $request = $this->get('request');

    if (is_null($id)) {
        $postData = $request->get('Testimony');
        $id = $postData['id'];
    }

    $form = $this->createForm(new TestimonyType(), $testimony);

    if ($request->getMethod() == 'POST') {
        $form->bind($request);

        if ($form->isValid()) {
             	$em = $this->getDoctrine()->getManager(); 
       	  $em->persist($testimony);
       	 $em->flush();

            return $this->redirect($this->generateUrl('homepage'));
        }
    }
     
 return $this->render('admin/articles/testimony.html.twig', array( 'form' => $form ->createView(),'testimony' => $alltestimony, ));
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 }
