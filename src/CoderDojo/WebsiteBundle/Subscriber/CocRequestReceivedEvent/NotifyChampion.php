<?php

namespace CoderDojo\WebsiteBundle\Subscriber\CocRequestReceivedEvent;

use CoderDojo\WebsiteBundle\Entity\CocRequest;
use CoderDojo\WebsiteBundle\Event\CocRequestReceivedEvent;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Swift_Mailer;
use Symfony\Bundle\TwigBundle\TwigEngine;

class NotifyChampion
{
    /**
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     * @var TwigEngine
     */
    private $templating;

    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * NotifySlack constructor.
     * @param Swift_Mailer $mailer
     * @param TwigEngine $templating
     * @param Registry $doctrine
     */
    public function __construct(
        Swift_Mailer $mailer,
        TwigEngine $templating,
        Registry $doctrine
    ) {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->doctrine = $doctrine;
    }

    public function notify(CocRequestReceivedEvent $event)
    {
        /** @var CocRequest $coc */
        $coc = $this->doctrine->getRepository(CocRequest::class)->find($event->getId());

        $message = \Swift_Message::newInstance()
            ->setSubject(sprintf('✅ VOG Aanvraag Voltooid'))
            ->setFrom('contact@coderdojo.nl', 'CoderDojo Nederland')
            ->setReplyTo('contact@coderdojo.nl')
            ->setTo($coc->getRequestedBy()->getEmail())
            ->setCc($coc->getRequestedFor()->getEmail())
            ->setBcc('website+vogrequest@coderdojo.nl')
            ->setContentType('text/html')
            ->setBody(
                $this->templating->render(
                    ':Dashboard:Email/Coc/received_champion.html.twig',
                    array(
                        'coc' => $coc
                    )
                )
            );

        $this->mailer->send($message);
    }
}
