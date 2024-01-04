<?php

namespace App\Controller;

use App\Repository\EmployeesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeesController extends AbstractController
{
    #[Route('/employees', name: 'employees')]
    public function employees(EmployeesRepository $employeesRepository): Response
    {
        $employees = $employeesRepository->findAll();

        $response = '
            <table>
                <tr>
                    <th>id |</th>
                    <th>first_name |</th>
                    <th>last_name |</th>
                    <th>salary</th>
                </tr>
            ';

        foreach ($employees as $employee) {
            $response .= '
                <tr>
                    <td>' . $employee->getId() . '</td>
                    <td>' . $employee->getFirstName() . '</td>
                    <td>' . $employee->getLastName() . '</td>
                    <td>' . $employee->getSalary() . '</td>
                </tr>';
        }

        $response .= '</table>';

        return new Response(
            $response
        );
    }
}