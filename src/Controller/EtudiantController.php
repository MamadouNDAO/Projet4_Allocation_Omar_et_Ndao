<?php
namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Form\EtudiantType;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/save_student", name="save_student.index")
     * @return Response
     */
    public function SaveStudent(Request $request):Response
    {
        $em       = $this->getDoctrine()->getManager();
        $etudiant = new Etudiant();
        $form     = $this->createForm(EtudiantType::class, $etudiant);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em->persist($etudiant);
            $em->flush();
        }

        return $this->render('pages/savestudent.html.twig', [
            'form' => $form->createView(),
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