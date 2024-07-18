<?php

declare(strict_types=1);

namespace App\Controller;

use OpenTelemetry\API\Trace\Span;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/roll-dice', name: 'app-roll-dice', methods: ['GET'])]
final class RollDiceController extends AbstractController
{
    public function __invoke(): Response
    {
        $roll = random_int(1, 6);

        $span = Span::getCurrent();
        $span->addEvent('DICE_ROLLED', ['result' => $roll]);

        return new Response((string) $roll);
    }
}
