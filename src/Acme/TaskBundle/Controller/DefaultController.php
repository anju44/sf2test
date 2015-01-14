<?php

	// src/Acme/TaskBundle/Controller/DefaultController.php
	namespace Acme\TaskBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Acme\TaskBundle\Entity\Task;
	use Symfony\Component\HttpFoundation\Request;
	use Acme\TaskBundle\Form\Type\TaskType;

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
	            ->add('dueDate', 'date', array(
	            	'widget' => 'single_text',
	            	'label' => 'Echéance',
	            	))
	            ->add('save', 'submit')
	            ->add('saveAndAdd', 'submit')
	            ->getForm();

	        // $form = $this->createFormBuilder($task)
	        // 	->setAction($this->generateUrl('target_route'))
	        // 	->setMethod('GET')
	        // 	->add('task', 'text')
	        // 	->add('dueDate', 'date')
	        // 	->getForm();

	        return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
	            'form' => $form->createView(),
	        ));

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