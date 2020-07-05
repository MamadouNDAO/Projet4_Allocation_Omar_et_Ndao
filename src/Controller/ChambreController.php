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
     * @Route("/list_room", name="list_room.index")
     * @return Response
     */
    public function ListRoom():Response
    {
        return $this->render('pages/listroom.html.twig', [
            'current_menu' => 'activation'
        ]);
    }
}