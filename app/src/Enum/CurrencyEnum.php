<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * Could be used and entity and stored in db,
 * but for simplicity and if it won't be changed often, use enum.
 */
enum CurrencyEnum: string
{
    case AED = 'AED';
    case AMD = 'AMD';

    case AUD = 'AUD';
    case AZN = 'AZN';
    case BYN = 'BYN';
    case BGN = 'BGN';
    case BRL = 'BRL';
    case CAD = 'CAD';
    case CHF = 'CHF';
    case CNY = 'CNY';
    case CZK = 'CZK';
    case DKK = 'DKK';
    case EGP = 'EGP';
    case EUR = 'EUR';
    case GBP = 'GBP';
    case GEL = 'GEL';
    case HKD = 'HKD';
    case HUF = 'HUF';
    case IDR = 'IDR';
    case ILS = 'ILS';
    case INR = 'INR';
    case ISK = 'ISK';
    case JPY = 'JPY';
    case KGS = 'KGS';
    case KRW = 'KRW';
    case KZT = 'KZT';
    case MDL = 'MDL';
    case MXN = 'MXN';
    case MYR = 'MYR';
    case NOK = 'NOK';
    case NZD = 'NZD';
    case PHP = 'PHP';
    case PLN = 'PLN';
    case QAR = 'QAR';
    case RON = 'RON';
    case RSD = 'RSD';
    case RUB = 'RUB';
    case SEK = 'SEK';
    case SGD = 'SGD';
    case THB = 'THB';
    case TMT = 'TMT';
    case TRY = 'TRY';
    case TJS = 'TJS';
    case UAH = 'UAH';
    case USD = 'USD';
    case UZS = 'UZS';
    case VND = 'VND';
    case XDR = 'XDR';
    case ZAR = 'ZAR';
}
