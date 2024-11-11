<?php

namespace App\Controller;

use App\DTO\Request\ConvertRequestDTO;
use App\DTO\Response\ConvertResponseDTO;
use App\Enum\CurrencyEnum;
use App\Service\CurrencyConversion;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

class ConvertController extends AbstractController
{
    #[Route('/api/convert', name: 'app_convert', methods: ['GET'])]
    public function __invoke(
        Request $request,
        CurrencyConversion $currencyConversionService,
    ): JsonResponse {
        // TODO: Introduce DTO instead of using request directly.
        try {
            $convertRequestDTO = new ConvertRequestDTO(
                from: CurrencyEnum::tryFrom($request->query->get('from')),
                to: CurrencyEnum::tryFrom($request->query->get('to')),
                amount: $request->query->get('amount')
                    ? (float)$request->query->get('amount')
                    : throw new InvalidArgumentException('Amount is required'),
            );
        } catch (Throwable $e) {
            //TODO: Introduce explicit error.
            return $this->json(['error' => 'Invalid or missing parameters'], 400);
        }

        try {
            $convertedAmount = $currencyConversionService->convert(
                $convertRequestDTO->from,
                $convertRequestDTO->to,
                $convertRequestDTO->amount,
            );
        } catch (Throwable $e) {
            //TODO: log the exception.
            return $this->json(['error' => 'Invalid or missing parameters'], 400);
        }

        // TODO: USe transformer to not create ConvertResponseDTO in controller.
        return $this->json(new ConvertResponseDTO(
            $convertRequestDTO->from->value,
            $convertRequestDTO->to->value,
            $convertRequestDTO->amount,
            $convertedAmount,
        ));
    }
}
