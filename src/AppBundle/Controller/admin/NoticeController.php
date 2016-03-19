<?php

namespace AppBundle\Controller\admin;

use AppBundle\Form\Type\NoticeType;
use AppBundle\Entity\Notice;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NoticeController extends Controller
{


    /**
     * @Route("/admin/notice", name="admin notice")
     */
    public function createAction(Request $request)
    {

        $Notice = $this->getDoctrine()
            ->getRepository('AppBundle:Notice');
        $allnotice = $Notice->findRescentNotice(1);


        $notice = new Notice();
        $form = $this->createForm(new NoticeType(), $notice);


        $form->handleRequest($request);

        if ($form->isValid())
        {



            $notice->setExpired(0);
            $notice->setPublishedAt(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($notice);
            $em->flush();
        }


        return $this->render('admin/articles/notice.html.twig', array( 'form' => $form ->createView(),'notice' => $allnotice, ));



    }



    /**
     * @Route("admin/notice/edit/{id}")
     */

    public function editAction($id){

        $em = $this->getDoctrine()->getEntityManager();
        $notice  = $em->getRepository('AppBundle:Notice')->find($id);
        $allnotice =$em->getRepository('AppBundle:Notice')->findRescentNotice('3');


        $request = $this->get('request');

        if (is_null($id)) {
            $postData = $request->get('Notice');
            $id = $postData['id'];
        }

        $form = $this->createForm(new NoticeType(), $notice);

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($notice);
                $em->flush();

                return $this->redirect($this->generateUrl('admin notice'));
            }
        }

        return $this->render('admin/articles/notice.html.twig', array( 'form' => $form ->createView(),'notice' => $allnotice, ));
    }













}
