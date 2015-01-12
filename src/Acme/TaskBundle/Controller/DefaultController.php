<?php

	// src/Acme/TaskBundle/Controller/DefaultController.php
	namespace Acme\TaskBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Acme\TaskBundle\Entity\Task;
	use Symfony\Component\HttpFoundation\Request;

	class DefaultController extends Controller
	{
	    public function newAction(Request $request)
	    {
	        // crée une tâche et lui donne quelques données par défaut pour cet exemple
	        $task = new Task();
	        $task->setTask('Ecrire un article');
	        $task->setDueDate(new \DateTime('tomorrow'));

	        $form = $this->createFormBuilder($task)
	            ->add('task', 'text')
	            ->add('dueDate', 'date')
	            ->add('save', 'submit')
	            ->add('saveAndAdd', 'submit')
	            ->getForm();

	        return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
	            'form' => $form->createView(),
	        ));
	    }

	    public function newAction(Request $request)
		{
		    // just setup a fresh $task object (remove the dummy data)
		    $task = new Task();

		    $form = $this->createFormBuilder($task)
		        ->add('task', 'text')
		        ->add('dueDate', 'date')
		        ->add('save', 'submit')
		        ->getForm();

		    $form->handleRequest($request);

		    if ($form->isValid()) 
		    {
				// fait quelque chose comme sauvegarder la tâche dans la bdd
		    	$nextAction = $form->get('saveAndAdd')->isClicked()
		    		? 'task_new'
		    		: 'task_success';

		    		return $this->redirect($this->generateUrl($nextAction));
		    }
	    } 
	}