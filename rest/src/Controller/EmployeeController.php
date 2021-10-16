<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    public function getEmployees()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT e.employeenumber, e.lastname, e.firstname, e.extension, e.email, IDENTITY(e.officecode) officecode, IDENTITY(e.reportsto) reportsto, e.jobtitle  FROM App:Employees e');
        $listEmployees = $query->getResult();

        return $this->render('employee/employee.html.twig', [
        'lista'=>$listEmployees
        ]);
    }
}
