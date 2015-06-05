<?php

namespace Training\ExerciseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template("")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder(null)
        	->setAction($this->generateUrl('hello'))
            ->add('name', 'text')
            ->add('submit', 'submit')
            ->getForm();

        return $this->render('TrainingExerciseBundle:Exercise:home.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/hello", name="hello")
     * @Template("")
     */
    public function helloAction(Request $request)
    {
    	if ($request->getMethod() == 'POST') {
    		$form = $request->request->get('form');				
    		$name = $form['name'];
    	}

    	return $this->render('TrainingExerciseBundle:Exercise:hello.html.twig', array('name' => $name));
    }

    /**
     * @Route("/contacts", name="contacts")
     * @Template("")
     */
    public function contactsAction()
    {
        return $this->render('TrainingExerciseBundle:Exercise:contacts.html.twig');
    }
}
