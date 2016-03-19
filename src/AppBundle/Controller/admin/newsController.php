<?php

namespace AppBundle\Controller\admin;

use AppBundle\Form\Type\NewsType;
use AppBundle\Entity\News;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\Date;


class NewsController extends Controller
 {
	
	
    /**
     * @Route("/admin/news", name="newsAdmin")
     */
    public function createAction(Request $request)
    {
    	
     $News = $this->getDoctrine() 
         ->getRepository('AppBundle:News');
     $allnews = $News->findAllRescentPublish('20');
        
			     if (!$News) 
			     { throw
			      $this->createNotFoundException( 'No News found for' );
			      }
     
     $news = new News(); 
     $form = $this->createForm(new NewsType(), $news);
    
      
        $form->handleRequest($request);
       
      if ($form->isValid())
       {
           /**
            * @var Symfony\Component\HttpFoundation\File\UploadedFile $file
            */
           $file = $news->getFile();

           //generate file name before saving i2
           $fileName = md5(uniqid()).'.'.$file->guessExtension();

           // Move the file to the directory where brochures are stored
            $brochuresDir = $this->container
                       ->getParameter('kernel.root_dir').'/../web/ uploads/images/news';
           $file->move($brochuresDir, $fileName);

           // Update the 'brochure' property to store the PDF file name
           // instead of its contents
           $news->setFile($fileName);
           $news->setPublishDate(new \DateTime());
           $news->setExpire(0);
           $news->setView(0);
           $news->setPath($brochuresDir);


           $em = $this->getDoctrine()->getManager();
           $em->persist($news);
       	   $em->flush();
           return $this->redirect($this->generateUrl('newsAdmin'));
      }
     

  return $this->render('admin/articles/news.html.twig', array( 'form' => $form ->createView(),'news' => $allnews, ));
       
       
    	    
     }
    


/**
 * @Route("admin/news/edit/{id}")
 */

public function editAction($id){ 
	
    $em = $this->getDoctrine()->getEntityManager();
    $News  = $em->getRepository('AppBundle:News')->find($id);
    $allnews =$em->getRepository('AppBundle:News')->findAllRescentPublish('15');
   
		
    $request = $this->get('request');

    if (is_null($id)) {
        $postData = $request->get('news');
        $id = $postData['id'];
    }

    $form = $this->createForm(new NewsType(), $News);

    if ($request->getMethod() == 'POST') {
        $form->bind($request);

        if ($form->isValid()) {

             	$em = $this->getDoctrine()->getManager(); 
       	  $em->persist($News);
       	 $em->flush();

            return $this->redirect($this->generateUrl('homepage'));
        }
    }
     
 return $this->render('admin/articles/news.html.twig', array( 'form' => $form ->createView(),'news' => $allnews, ));
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 }
