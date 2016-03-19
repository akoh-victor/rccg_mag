<?php

namespace AppBundle\Controller\admin;

use AppBundle\Form\Type\AdvertType;
use AppBundle\Entity\Advert;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
 {
	
	
    /**
     * @Route("/admin/advert", name="adminAds")
     */
    public function createAction(Request $request)
    {
    	
     $Advert = $this->getDoctrine() 
         ->getRepository('AppBundle:Advert');
     $allAdvert = $Advert->findRescentAdverts(5);
        
			   
     
     $Advert = new Advert(); 
     $form = $this->createForm(new AdvertType(), $Advert);
    
      
        $form->handleRequest($request);
       
      if ($form->isValid())
       {

           /**
            * @var Symfony\Component\HttpFoundation\File\UploadedFile $file
            */
           $file = $Advert->getBanner();

           //generate file name before saving i2
           $bannerName = md5(uniqid()).'.'.$file->guessExtension();

           // Move the file to the directory where brochures are stored
           $brochuresDir = $this->container
                   ->getParameter('kernel.root_dir').'/../web/ uploads/images/advert';
           $file->move($brochuresDir, $bannerName);

           // Update the 'brochure' property to store the PDF file name
           // instead of its contents
           $Advert->setBanner($bannerName);



       	$em = $this->getDoctrine()->getManager(); 
       	$em->persist($Advert);
       	 $em->flush();
           return $this->redirect($this->generateUrl('adminAds'));
      }
     

  return $this->render('admin/articles/advert.html.twig', array( 'form' => $form ->createView(),'advert' => $allAdvert, ));
     }
    


/**
 * @Route("/admin/advert/edit/{id}")
 */

public function editAction($id){ 
	
    $em = $this->getDoctrine()->getEntityManager();
    $Advert  = $em->getRepository('AppBundle:Advert')->find($id);
    $allAdvert =$em->getRepository('AppBundle:Advert')->findRescentAdverts('3');
   
		
 $request = $this->get('request');

    if (is_null($id)) {
        $postData = $request->get('advert');
        $id = $postData['id'];
    }

    $form = $this->createForm(new AdvertType(), $Advert);

    if ($request->getMethod() == 'POST') {
        $form->bind($request);

        if ($form->isValid()) {
             	$em = $this->getDoctrine()->getManager(); 
       	  $em->persist($Advert);
       	 $em->flush();

            return $this->redirect($this->generateUrl('homepage'));
        }
    }
     
 return $this->render('admin/articles/advert.html.twig', array( 'form' => $form ->createView(),'advert' => $allAdvert, ));
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 }
