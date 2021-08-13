<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PointSurveillance;
use App\Entity\Zone;

class PointSurveillanceController extends AbstractController
{
    
    #[Route('/point_surveillance', name :"point_surveillance")]
    public function index(): Response
    {
            $entityManager = $this->getDoctrine()->getManager();
            $data ["listeDesPoints"] = $entityManager->getRepository(PointSurveillance::class)->findAll();
            $data ["listeZone"] = $entityManager->getRepository(Zone::class)->findAll();
            return $this->render('point_surveillance/index.html.twig', $data);
    }

    #[Route('/point_surveillance/ajoutPtS', name :"insertPtSurv")]
    public function addPointSurv(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $point = new PointSurveillance();
        $point->setCode($_POST["codePt"]);
        $point->setCoordonnees($_POST["coord"]);
        $point->setZones($_POST["zones"]);
        $zone = $entityManager->getRepository(Zone::class)->find($_POST["selectZone"]);
        $point->setZones($zone);
        $entityManager->persist($point);
        $entityManager->flush();
        return $this->redirectToRoute("point_surveillance");
    }

        /*
        *@Route("/PointSurveillance/nouveau",name="createpoint")
        **/
        public function create()
        {
            $point = new PointSurveillance();
            $entityManager = $this->getDoctrine()->getManager();

            return $this->redirectToRoute("point_surveillance");
        }
}
