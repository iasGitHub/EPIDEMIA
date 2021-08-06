<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use App\Entity\Pays;
    
    class PaysController extends AbstractController
    {
        
        #[Route('/pays', name :"accespays")]
        public function index(): Response
        {
            $entityManager = $this->getDoctrine()->getManager();
            $data ["listePays"] = $entityManager->getRepository(Pays::class)->findAll();

            return $this->render('pays/index.html.twig', $data);
        }

        #[Route('/pays/ajoutPays', name :"insertPays")]
        public function addPays(): Response
        {
            $entityManager = $this->getDoctrine()->getManager();
            $pays = new Pays();
            $pays->setNom($_POST["nomPays"]);
            $entityManager->persist($pays);
            $entityManager->flush();
            return $this->redirectToRoute("accespays");
        }

        #[Route('/pays/supprimerPays/{id}', name :"deletePays")]
        public function delete($id): Response
        {
            $entityManager = $this->getDoctrine()->getManager();
            $pays = $entityManager->getRepository(Pays::class)->find($id);
            $entityManager->remove($pays);
            $entityManager->flush();
            return $this->redirectToRoute("accespays");
        }


        /*
        *@Route("/Pays/nouveau",name="createpays")
        **/
        public function create()
        {
            $pays = new Pays();
            $entityManager = $this->getDoctrine()->getManager();

            return $this->redirectToRoute("accespays");
        }
        
    }
    
?>
