<?php

namespace CoderDojo\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PagesController extends Controller
{
    /******************
     * MEEHELPEN
     ******************/

    /**
     * @Route("/meehelpen/opstarten", name="setup")
     */
    public function setupAction()
    {
        return $this->render(':Pages:Meehelpen/setup.html.twig');
    }

    /**
     * @Route("/meehelpen/mentor-worden", name="mentors")
     */
    public function mentorAction()
    {
        return $this->render(':Pages:Meehelpen/mentor.html.twig');
    }

    /**
     * @Route("/meehelpen/materiaal", name="material")
     */
    public function materialAction()
    {
        return $this->render(':Pages:Meehelpen/material.html.twig');
    }

    /******************
     * Samenwerkingen
     ******************/
    /**
     * @Route("/samenwerkingen/code-qube", name="codeqube")
     */
    public function codeQubeAction()
    {
        return $this->render(':Pages:Samenwerkingen/codeqube.html.twig');
    }

    /**
     * @Route("/samenwerkingen/ziggo", name="ziggo")
     *
    public function ziggoAction()
    {
        return $this->render(':Pages:Samenwerkingen/ziggo.html.twig');
    }
    */

    /**
     * @Route("/samenwerkingen/eu-code-week", name="eucodeweek")
     */
    public function euCodeWeekAction()
    {
        return $this->render(':Pages:Samenwerkingen/codeweekEU.html.twig');
    }

    /**
     * @Route("/samenwerkingen/boeken", name="books")
     */
    public function booksAction()
    {
        return $this->render(':Pages:Samenwerkingen/books.html.twig');
    }

    /******************
     * De Stichting
     ******************/

    /**
     * @Route("/informatie/over-coderdojo", name="about")
     */
    public function aboutAction()
    {
        return $this->render(':Pages:Achtergrond/about.html.twig');
    }

    /**
     * @Route("/informatie/over-de-stichting", name="foundation")
     */
    public function foundationAction()
    {
        return $this->render(':Pages:Achtergrond/stichting.html.twig');
    }

    /**
     * @Route("/informatie/nieuwsbrief", name="newsletter")
     */
    public function newsletterAction()
    {
        return $this->render(':Pages:Achtergrond/newsletter.html.twig');
    }

    /******************
     * SUPPORTING
     ******************/

    /**
     * @Route("/space-games", name="space-games")
     */
    public function spaceGamesAction()
    {
        return $this->render(':Pages:Supporting/spaceGames.html.twig');
    }


    /**
     * @Route("/ziggodome", name="ZiggoDome")
     */
    public function ziggodomeAction()
    {
        return $this->render(':Pages:Supporting/ziggodome.html.twig');
    }

    /**
     * @Route("/survey", name="survey")
     */
    public function surveyAction()
    {
        return $this->render(':Pages:survey.html.twig');
    }

    /**
     * @Route("/coolest-projects", name="coolest-projects")
     */
    public function coolestProjectsAction()
    {
        return $this->render(':Pages:cooles-projects.html.twig');
    }
}
