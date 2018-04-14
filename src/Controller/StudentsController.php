<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StudentsController extends Controller
{
    /**
     * @Route("/students", name="students")
     */
    public function index()
    {

        $json = '{"Po pamok\u0173":{"mentor":"Tomas","members":["Elena","Just\u0117","Deimantas"]},"Tech Guide":{"mentor":"Sergej","members":["Matas","Martynas"]},"Kelion\u0117s draugas":{"mentor":"Rokas","members":["Zbignev","Aist\u0117"]},"Wish A Gift":{"mentor":"Aistis","members":["Nerijus","Olga"]},"Mums pakeliui":{"mentor":"Paulius","members":["Egl\u0117","Svetlana"]},"Motyvacin\u0117 platforma":{"mentor":"Audrius","members":["Viktoras","Airidas"]}}';

        $students= json_decode($json, true);


        return $this->render('students/index.html.twig', [
            'students' => $students,
        ]);
    }

    /**
     * @Route("/student")
     *
     */
    public function show(Request $request)
    {

        $mentor = $request->get('utm_campaign', 'Mentorius');
        $student = $request->get('utm_term', 'Studentas');
        $team = $request->get('utm_content', 'Komanda');


        return $this->render('students/show.html.twig', [
                'utm_campaign' =>$mentor,
                'utm_term' => $student,
                'utm_content' => $team

        ]);
    }
}
