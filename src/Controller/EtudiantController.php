<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/save_student", name="save_student.index")
     * @return Response
     */
    public function SaveStudent():Response
    {
        return $this->render('pages/savestudent.html.twig', [
            'current_menu' => 'activation'
        ]);
    }

    /**
     * @Route("/list_student", name="list_student.index")
     * @return Response
     */
    public function ListStudent():Response
    {
        return $this->render('pages/liststudent.html.twig', [
            'current_menu' => 'activation'
        ]);
    }
}