<?php

namespace kosssi\SimpleTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use kosssi\SimpleTaskBundle\Entity\Label;

class LabelController extends Controller
{
    /**
     * @Route("/label/new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        // crée une tâche et lui donne quelques données par défaut pour cet exemple
        $label = new Label();
        $label->setName('Write a blog post');

        $form = $this->createFormBuilder($label)
          ->add('Name', 'text')
          ->getForm();

        return array(
            'form' => $form->createView(),
        );
    }
}
