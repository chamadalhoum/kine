<?php

namespace App\EventListener;
use App\Entity\Rendezvous;
use Doctrine\ORM\EntityManager;
use App\Repository\RendezvousRepository;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FullCalendarListener
{
    private $rendezvousRepository;
    private $router;

    public function __construct(
        RendezvousRepository $rendezvousRepository,
        UrlGeneratorInterface $router
    ) {
        $this->rendezvousRepository = $rendezvousRepository;
        $this->router = $router;
    }
    public function loadEvents(CalendarEvent $calendar)
    {
    $start = $calendar->getStart();
    $end = $calendar->getEnd();
    $filters = $calendar->getFilters();

    // Modify the query to fit to your entity and needs
    // Change booking.beginAt by your start date property
    $bookings = $this->rendezvousRepository
        ->createQueryBuilder('rendezvous')
        ->andWhere('rendezvous.heure BETWEEN :start and :end')
       
        ->setParameter('start', $start->format('Y-m-d H:i:s'))
        ->setParameter('end', $end->format('Y-m-d H:i:s'))
        ->getQuery()
        ->getResult()
    ;

    foreach ($bookings as $booking) {
        // this create the events with your data (here booking data) to fill calendar
        $bookingEvent = new Event(
           // $booking->getPatient(),
            $booking->getHeure(),
            $booking->getDuree() // If the end date is null or not defined, a all day event is created.
        );

        /*
         * Add custom options to events
         *
         * For more information see: https://fullcalendar.io/docs/event-object
         * and: https://github.com/fullcalendar/fullcalendar/blob/master/src/core/options.ts
         */
        $bookingEvent->setUrl(
            $this->router->generate('booking_show', [
                'id' => $booking->getId(),
            ])
        );
        /*$bookingEvent->setOptions([
            'backgroundColor' => 'red',
            'borderColor' => 'red',
        ]);
        $bookingEvent->addOption(
            'url',
            $this->router->generate('booking_show', [
                'id' => $booking->getId(),
            ])
        );*/

        // finally, add the event to the CalendarEvent to fill the calendar
        $calendar->addEvent($bookingEvent);
    }
}
}