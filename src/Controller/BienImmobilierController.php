<?php

namespace App\Controller;

use App\Entity\BienImmobilier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class   BienImmobilierController extends AbstractController
{
    /**
     * [Route('/bien_immobilier',  'app_bien_immobilier')
     */

    public function listeBienImmobilier(){

        $em = $this->getDoctrine()->getManager();
        $BienImmobilier = $em->getRepository(BienImmobilier::class)->findAll();

        return $this->render("Bien_Immobilier/listBienImmobilier.html.twig",
         array("listBienImmobilier"=>$BienImmobilier));
    }


}
