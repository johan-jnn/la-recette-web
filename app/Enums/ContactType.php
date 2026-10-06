<?php

namespace App\Enums;

enum ContactType: string
{
    case QUESTION = "question";
    case DEVIS = "devis";
    case RESERVATION = "reservation";
    case AUTRE = "other";
}
