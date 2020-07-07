<?php
namespace App\Controller;

use App\Entity\Batiment;
use App\Form\BatimentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Chambre;
use App\Form\ChambreType;
use Knp\Component\Pager\PaginatorInterface;


class ChambreController extends AbstractController
{
    /**
     * @Route("/save_room", name="save_room.index")
     * @return Response
     */
    public function SaveRoom(Request $request):Response
    {
        $em       = $this->getDoctrine()->getManager();
        $chambre = new Chambre();
        $form     = $this->createForm(ChambreType::class, $chambre);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {

            $em->persist($chambre);
            $em->flush();
        }

        return $this->render('pages/saveroom.html.twig', [
            'form' => $form->createView(),
            'current_menu' => 'activation'
        ]);


    }

    /**
     * @Route("/list_room", name="list_room.index", defaults={"page"=1})
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function ListRoom(Request $request, PaginatorInterface $paginator)
    {

        $em = $this->getDoctrine()->getManager();
        $rooms = $this->getDoctrine()->getRepository(Chambre::class)->findAll();


       // $send = $em->getRepository(Chambre::class);
       // $rooms =$send->createQueryBuilder('p')->getQuery();

        //$paginator = $this->get('knp_paginator');

       $pagination= $paginator->paginate(
          $rooms,
          $request->query->getInt('page', 1),
            5
       );

        return $this->render('pages/listroom.html.twig', [
            'chambre' => $pagination,

        ]);
    }
}