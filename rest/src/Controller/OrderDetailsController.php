<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderDetailsController extends AbstractController
{
    public function getOrderDetails()
    {
        $em = $this->getDoctrine()->getManager();
        $query =  $em->createQuery('SELECT IDENTITY(o.productcode) productcode , IDENTITY(o.ordernumber) ordernumber, o.orderlinenumber, o.priceeach, o.quantityordered FROM App:OrderDetails o');
        $listOrderD = $query->getResult();

        return $this->render('orderdetails/orderdetails.html.twig', [
            'lista' => $listOrderD
        ]);
    }
}
