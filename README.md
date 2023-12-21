# Steam PHP API

[![License](https://img.shields.io/packagist/l/vinevax/steam-php-api.svg?style=flat-square)](https://packagist.org/packages/vinevax/steam-php-api)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/vinevax/steam-php-api.svg?style=flat-square)](https://packagist.org/packages/vinevax/steam-php-api)
[![Total Downloads](https://img.shields.io/packagist/dt/vinevax/steam-php-api?style=flat-square)](https://packagist.org/packages/vinevax/steam-php-api)

## Installation

```bash
composer require "vinevax/steam-php-api"
```

## Usage

First create a new instance of `VineVax\SteamPHPApi\SteamClient` with your API key.
You can get your API key from [here](https://steamcommunity.com/dev/apikey).

```php
use VineVax\SteamPHPApi\SteamClient;

$steam = new SteamClient('YOUR_API_KEY');
```

### Available methods
Get game news
```php
$steam->getNewsForApp(appId: 440, count: 3, maxlength: 300);
```

Get global achievements overview
```php
$steam->getGlobalAchievementPercentagesForApp(appId: 440);
```

Get player summaries (accepts 1 steamid or an array of steamids)
```php
$steam->getPlayerSummaries(steamIds: 76561197960435530);
$steam->getPlayerSummaries(steamIds: [76561197960435530, 76561197960435531]);
```

Get player friend list
```php
$steam->getFriendList(steamId: 76561197960435530, relationship: 'friend');
```

Get player achievements
```php
$steam->getPlayerAchievements(steamId: 76561197960435530, appId: 440, language: \VineVax\SteamPHPApi\Enums\Language::ENGLISH);
```

Get player stats for game
```php
$steam->getPlayerStatsForGame(steamId: 76561197960435530, appId: 440, language: \VineVax\SteamPHPApi\Enums\Language::ENGLISH);
```

Get owned games
```php
$steam->getOwnedGames(steamId: 76561197960435530, includeAppInfo: true, includeFreeGames: true);
```

Get recently played games
```php
$steam->getRecentlyPlayedGames(steamId: 76561197960435530, count: 15);
```