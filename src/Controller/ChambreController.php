<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/save_room", name="save_room.index")
     * @return Response
     */
    public function SaveRoom():Response
    {
        return $this->render('pages/saveroom.html.twig', [
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