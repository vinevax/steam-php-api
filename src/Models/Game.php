<?php

namespace VineVax\SteamPHPApi\Models;

use DateTimeImmutable;

readonly class Game
{
    public ?DateTimeImmutable $lastPlayed;
    public ?string $imgIconUrl;
    public ?string $imgLogoUrl;


    public function __construct(
        public ?int $appId,
        public ?string $name,
        public ?int $playtimeForever,
        public ?int $playtime2Weeks,
        ?string $imgIconUrl,
        ?string $imgLogoUrl,
        public ?bool $hasCommunityVisibleStats,
        public ?int $playtimeWindowsForever,
        public ?int $playtimeMacForever,
        public ?int $playtimeLinuxForever,
        ?int $lastPlayed = null,
    ){
        $this->imgLogoUrl = $imgLogoUrl ? 'https://media.steampowered.com/steamcommunity/public/images/apps/' . $appId . '/' . $imgLogoUrl . '.jpg': null;
        $this->imgIconUrl = $imgIconUrl ? 'https://media.steampowered.com/steamcommunity/public/images/apps/' . $appId . '/' . $imgIconUrl . '.jpg': null;

        $this->lastPlayed = $lastPlayed ? DateTimeImmutable::createFromFormat('U', $lastPlayed): null;
    }
}