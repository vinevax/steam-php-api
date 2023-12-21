<?php

namespace VineVax\SteamPHPApi\Enums;

enum CommunityVisibilityState: int
{
    case PRIVATE = 1;
    case FRIENDS_ONLY = 2;
    case PUBLIC = 3;
}