<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
#[Route('/admin', name: 'admin_homepage')]
public function adminHome(): Response
{
return $this->render('admin/home.html.twig');
}
}
