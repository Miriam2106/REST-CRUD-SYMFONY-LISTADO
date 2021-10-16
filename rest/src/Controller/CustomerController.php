<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    public function getCustomers()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.customernumber, c.customername, c.contactlastname, c.contactfirstname, c.phone, c.addressline1, c.addressline2, c.city, c.state, c.postalcode, c.country,  c.creditlimit, IDENTITY(c.salesrepemployeenumber) salesrepemployeenumber FROM App:Customers c');
        $listCustomers = $query->getResult();

        return $this->render('customer/customer.html.twig', [
        'lista'=>$listCustomers
        ]);
    }
}
