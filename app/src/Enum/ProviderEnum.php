<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * Could be used and entity and stored in db,
 * but for simplicity and if it won't be changed often, use enum.
 */
enum ProviderEnum: string
{
    case ECB = 'ECB';
    case CBR = 'CBR';
}
