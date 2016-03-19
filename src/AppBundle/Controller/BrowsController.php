<?php
 
namespace AppBundle\Controller;

use AppBundle\Entity\News;
use AppBundle\Entity\Event;
use AppBundle\Entity\Testimony;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BrowsController extends Controller
 {

    /**
             * @Route("/news/{categoryId}", name="category")
             */
            public function browsCategoryAction($categoryId)
            {
                $News = $this->getDoctrine()->getRepository('AppBundle:News');
                $Categories = $this->getDoctrine()->getRepository('AppBundle:Category');
                $sliderAds = $News->findSliderNews('20');
                $category =  $Categories->findOneById($categoryId);
                $otherCategory = $Categories->findOtherJoinedCategory($categoryId);
                if(!$category){
                    throw $this->createNotFoundException( 'No product found for');
                }

                return $this->render('default/category.html.twig', array(
                    'category' => $category,
                    'otherCategory'=>$otherCategory,
                    'sliderAds' => $sliderAds,
                ));
            }




    /**
     * @Route("/news", name="newsHome")
     */
    public function browsNewsAction()
    {
        $News = $this->getDoctrine()->getRepository('AppBundle:News');
        $Categories = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories =  $Categories->fin(2);
        $uncategorisedNews = $News->findAllRescentPublish('12');
        $categorisedNews = $News->findAllRescentPublish('3');
        $sliderAds = $News->findSliderNews('10');

        return $this->render('default/newsHome.html.twig', array(

            'uncategorisedNews'=> $uncategorisedNews,
            'categorisedNews' =>$categorisedNews,
            'categories' => $categories,
            'sliderAds' => $sliderAds,
        ));
    }


    /**
     * @Route("/news/{category}/{id}", name="browsnews")
     */
    public function browsAction($category,$id)
    {

        $News = $this->getDoctrine()->getRepository('AppBundle:News');
        $newsResorces = $News->find($id);
        $mostRead=$News->mostView(6);
        $next= $News->findAllRescentPublish('3');

        $cat = $newsResorces-> getCategory();
        $catId=$cat-> getId();
        $moreNews = $News->moreNews($catId,2);

                if ($newsResorces) {

                    $curView = $newsResorces->getView();
                    $upView = $curView + 1;
                    $newsResorces->setView($upView);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($newsResorces);
                    $em->flush();
                }
         $from ="News";


        return $this->render('default/brows.html.twig', array(
            'selectedCategory'=>$category,
            'newsResorces' =>  $newsResorces,
            'nextNews' => $next,
            'moreNews' => $moreNews,
            'mostRead' => $mostRead,
            'origin'   => $from,
        ));
    }



    /**
     * @Route("/testimony/{id}", name="browsTestimony")
     */
    public function browsTestimonyAction($id)
    {

        $Testimony = $this->getDoctrine()->getRepository('AppBundle:Testimony');
        $testimony = $Testimony->find($id);
        $moreTestimony = $Testimony->moreTestimony($id,15);


        $from ="Testimony";

        return $this->render('default/brows.html.twig', array(
            'testimony' =>  $testimony,
            'moreTestimony' => $moreTestimony,
            'origin'=>$from,
        ));
    }

    /**
     * @Route("/notice/{id}", name="browsNotice")
     */
    public function browsNoticeAction($id)
    {

        $Notice = $this->getDoctrine()->getRepository('AppBundle:Notice');
        $notice = $Notice->find($id);
        $moreNotice = $Notice->moreNotice(15);

        $from ="Notice";


        return $this->render('default/brows.html.twig', array(
            'notice'=> $notice,
            'moreNotice'=> $moreNotice,
            'origin'=>$from,
        ));
    }









}
