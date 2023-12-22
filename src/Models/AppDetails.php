<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppDetails
{
    public function __construct(
        public ?string             $type,
        public ?string             $name,
        public ?int                $steamAppId,
        public ?int                $requiredAge,
        public ?bool               $isFree,
        public ?string             $controllerSupport,
        /** @var int[] */
        public ?array              $dlc,
        public ?string             $detailedDescription,
        public ?string             $aboutTheGame,
        public ?string             $shortDescription,
        public ?string             $supportedLanguages,
        public ?string             $headerImage,
        public ?string             $capsuleImage,
        public ?string             $capsuleImageV5,
        public ?string             $website,
        public ?AppRequirements    $pcRequirements,
        public ?AppRequirements    $macRequirements,
        public ?AppRequirements    $linuxRequirements,
        public ?string             $legalNotice,
        public ?string             $drm_notice, // TODO
        public ?string             $ext_user_account_notice,
        /** @var string[] */
        public ?array              $developers,
        /** @var string[] */
        public ?array              $publishers,
        /** @var AppDemo[] */
        public ?array              $demos,
        public ?AppPrice           $priceOverview,
        /** @var int[] */
        public ?array              $packages,
        public ?array              $packageGroups, // TODO: PackageGroup[]
        public ?AppPlatforms       $platforms,
        public ?AppMetacritic      $metacritic,
        /** @var AppCategory[] */
        public ?array              $categories,
        /** @var AppGenre[] */
        public ?array              $genres,
        /** @var AppScreenshot[] */
        public ?array              $screenshots,
        /** @var AppMovie[] */
        public ?array              $movies,
        public ?AppRecommendations $recommendations,
        public ?AppAchievements    $achievements,
        public ?AppReleaseDate     $releaseDate,
        public ?AppSupportInfo     $supportInfo,
        public ?string             $background,
        public ?string             $backgroundRaw,
        public ?array              $content_descriptors,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'] ?? null,
            $data['name'] ?? null,
            $data['steam_appid'] ?? null,
            $data['required_age'] ?? null,
            $data['is_free'] ?? null,
            $data['controller_support'] ?? null,
            $data['dlc'] ?? null,
            $data['detailed_description'] ?? null,
            $data['about_the_game'] ?? null,
            $data['short_description'] ?? null,
            $data['supported_languages'] ?? null,
            $data['header_image'] ?? null,
            $data['capsuleImage'] ?? null,
            $data['capsuleImageV5'] ?? null,
            $data['website'] ?? null,
            AppRequirements::fromArray($data['pc_requirements'] ?? []),
            AppRequirements::fromArray($data['mac_requirements'] ?? []),
            AppRequirements::fromArray($data['linux_requirements'] ?? []),
            $data['legal_notice'] ?? null,
            $data['drm_notice'] ?? null,
            $data['ext_user_account_notice'] ?? null,
            $data['developers'] ?? null,
            $data['publishers'] ?? null,
            array_map(fn($demo) => AppDemo::fromArray($demo), $data['demos'] ?? []),
            AppPrice::fromArray($data['price_overview'] ?? []),
            $data['packages'] ?? null,
            $data['package_groups'] ?? null,
            AppPlatforms::fromArray($data['platforms'] ?? []),
            AppMetacritic::fromArray($data['metacritic'] ?? []),
            array_map(fn($category) => AppCategory::fromArray($category), $data['categories'] ?? []),
            array_map(fn($genre) => AppGenre::fromArray($genre), $data['genres'] ?? []),
            array_map(fn($screenshot) => AppScreenshot::fromArray($screenshot), $data['screenshots'] ?? []), // todo
            array_map(fn($movie) => AppMovie::fromArray($movie), $data['movies'] ?? []),
            AppRecommendations::fromArray($data['recommendations'] ?? []),
            AppAchievements::fromArray($data['achievements'] ?? []),
            AppReleaseDate::fromArray($data['release_date'] ?? []),
            AppSupportInfo::fromArray($data['support_info'] ?? []),
            $data['background'] ?? null,
            $data['background_raw'] ?? null,
            $data['content_descriptors'] ?? null
        );
    }
}