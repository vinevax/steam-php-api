<?php

namespace VineVax\SteamPHPApi\Enums;

enum PersonaState: int
{
    case OFFLINE = 0;
    case ONLINE = 1;
    case BUSY = 2;
    case AWAY = 3;
    case SNOOZE = 4;
    case LOOKING_TO_TRADE = 5;
    case LOOKING_TO_PLAY = 6;
}