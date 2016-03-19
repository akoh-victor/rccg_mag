<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use AppBundle\Entity\Event;
use AppBundle\Entity\Notice;
use AppBundle\Entity\Testimony;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $Testimony = $this->getDoctrine()->getRepository('AppBundle:Testimony');
    	$News = $this->getDoctrine()->getRepository('AppBundle:News');
        $Category = $this->getDoctrine()->getRepository('AppBundle:Category');
        $Advert = $this->getDoctrine()->getRepository('AppBundle:Advert');
        $Notice = $this->getDoctrine()->getRepository('AppBundle:Notice');


        $mostView = $News-> mostView(6);
        $moreNews =$News->findPositionedNews('more',5);
        $moreNotice = $Notice->findall();
        $moreTestimony = $Testimony->findall();

        $slideAds=$Advert->findRescentAdverts(7);
        $testimonies = $Testimony->findRescentTestimonies(4);



        $RightNews = $News->findPositionedNews('right',3);
        $LeftNews = $News->findPositionedNews('left',3);

        $xLeftNews = $News->findPositionedNews('xleft',1);
        $xRightNews = $News->findPositionedNews('xright',1);

        $topNews =$News->findPositionedNews('top',15);

        $newsCategories =$Category->findJoinedCategory();





        return $this->render('default/index.html.twig', array(
                 'mostView'=>$mostView ,
                 'moreNotice'=>$moreNotice,
                 'moreTestimony'=>$moreTestimony,
        		 'topNews' => $topNews,
                 'moreNews' => $moreNews,
                 'testimonies'=>$testimonies,
                 'xLeftNews'=> $xLeftNews,
                 'xRightNews'=> $xRightNews,
                 'RightNews'=> $RightNews,
                 'LeftNews'=> $LeftNews,
                 'newsCategories'=> $newsCategories,
                 'sliderAds'=>$slideAds
        ));
    }





    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {
    	$pageTitle='good news ';
    	$categories[]= "NEWS";
    	$categories[]= "EVENTS";
    	$categories[]= "ADVERTS";
    	$categories[]= "TESTIMONIES";
       
        return $this->render('admin/base.html.twig', array(
            'pageTitle' => $pageTitle,
        'categories' => $categories,
        ));
    }
    

}
