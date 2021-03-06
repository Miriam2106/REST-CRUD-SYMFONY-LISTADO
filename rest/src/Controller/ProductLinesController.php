<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductLinesController extends AbstractController
{
    public function getProductLines()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p.productline, p.textdescription, p.htmldescription, p.image FROM App:Productlines p');
        $listProductLines = $query->getResult();

        return $this->render('productlines/productlines.html.twig', [
        'lista'=>$listProductLines
        ]);
    }
}
