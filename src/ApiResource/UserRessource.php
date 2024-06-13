<?php

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Entity\Element;
use App\Entity\User;
use App\State\EntityClassDtoStateProcessor;
use App\State\EntityToDtoStateProvider;

#[ApiResource(
    shortName: 'User',
    operations: [
        new Get(),
        new GetCollection(),
        new Post(
            formats: ['json'=>['application/json']],
        ),
        new Patch(),
        new Delete(
            security: 'is_granted("ROLE_ADMIN")',
        )
    ],
    paginationItemsPerPage: 5,
    provider: EntityToDtoStateProvider::class,
    processor: EntityClassDtoStateProcessor::class,
    stateOptions: new Options(entityClass: User::class),
)]
class UserRessource
{
    #[ApiProperty(readable: true,writable: false)]
    public ?int $id = null;
    public ?string $email = null;
    public ?string $password = null;

    public ?string $telephone = null;

    public ?string $fullName = null;


    public ?string $age = null;

    public ?string $imgUrl = null;

    public ?string $badge = null;

    public ?string $bio = null;

    public ?array $roles = [];


//    public ?Site $siteId = null;
//
//    public Collection $elements;
//
//    public Collection $bookings;
//
//    public Collection $messages;
//
//    public Collection $receivers;

}