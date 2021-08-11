<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use App\Entity\Zone;
    use App\Entity\Pays;
    
    class ZoneController extends AbstractController
    {
        
        #[Route('/zone', name :"acceszone")]
        public function index(): Response
        {
            $entityManager = $this->getDoctrine()->getManager();
            $data ["listeZone"] = $entityManager->getRepository(Zone::class)->findAll();
            $data ["listePays"] = $entityManager->getRepository(Pays::class)->findAll();
            return $this->render('zone/index.html.twig', $data);
        }

        #[Route('/zone/ajoutZone', name :"insertZone")]
        public function addZone(): Response
        {
            $entityManager = $this->getDoctrine()->getManager();
            $zone = new Zone();
            $zone->setNom($_POST["nomZone"]);
            $pays = $entityManager->getRepository(Pays::class)->find($_POST["selectPays"]);
            $pays->setPays($pays);
            $entityManager->persist($zone);
            $entityManager->flush();
            return $this->redirectToRoute("acceszone");
        }

        #[Route('/zone/supprimerZone/{id}', name :"deleteZone")]
        public function delete($id): Response
        {
            $entityManager = $this->getDoctrine()->getManager();
            $zone = $entityManager->getRepository(Zone::class)->find($id);
            $entityManager->remove($zone);
            $entityManager->flush();
            return $this->redirectToRoute("acceszone");
        }


        /*
        *@Route("/Zone/nouveau",name="createzone")
        **/
        public function create()
        {
            $zone = new Zone();
            $entityManager = $this->getDoctrine()->getManager();

            return $this->redirectToRoute("acceszone");
        }
        
    }
    
?>
