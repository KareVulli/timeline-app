<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

/**
 * @Route("/api", name="api_events_")
 */
class EventController extends FOSRestController
{
    /**
     * @Rest\Get("/events", name="get_events")
     */
    public function getEventsAction(): View
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findall();
        return $this->view($events);
    }

    /**
     * @Rest\Post("/event", name="save_event")
     */
    public function postEventAction(Request $request): View
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        //$form->handleRequest($request);
        $form->submit($request->request->all());
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->view($event, Response::HTTP_CREATED);
        }
        return $this->view($form);
    }
}
