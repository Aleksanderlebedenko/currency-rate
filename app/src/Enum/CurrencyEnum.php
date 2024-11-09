<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * Could be used and entity and stored in db,
 * but for simplicity and if it won't be changed often, use enum.
 */
enum CurrencyEnum: string
{
    case AUD = 'AUD';
    case BGN = 'BGN';
    case BRL = 'BRL';
    case CAD = 'CAD';
    case CHF = 'CHF';
    case CNY = 'CNY';
    case CZK = 'CZK';
    case DKK = 'DKK';
    case EUR = 'EUR';
    case GBP = 'GBP';
    case HKD = 'HKD';
    case HUF = 'HUF';
    case IDR = 'IDR';
    case ILS = 'ILS';
    case INR = 'INR';
    case ISK = 'ISK';
    case JPY = 'JPY';
    case KRW = 'KRW';
    case MXN = 'MXN';
    case MYR = 'MYR';
    case NOK = 'NOK';
    case NZD = 'NZD';
    case PHP = 'PHP';
    case PLN = 'PLN';
    case RON = 'RON';
    case RUB = 'RUB';
    case SEK = 'SEK';
    case SGD = 'SGD';
    case THB = 'THB';
    case TRY = 'TRY';
    case USD = 'USD';
    case ZAR = 'ZAR';
}
