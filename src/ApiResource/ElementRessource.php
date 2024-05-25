<?php

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Entity\Element;
use App\State\EntityClassDtoStateProcessor;
use App\State\EntityToDtoStateProvider;

#[ApiResource(
    shortName: 'Element',
    operations: [
        new Get(),
        new GetCollection(),
        new Post(
            formats: ['json'=>['application/json']],
            security: 'is_granted("ROLE_PRODUCT_CREATE")',
        ),
        new Patch(),
        new Delete(
            security: 'is_granted("ROLE_ADMIN")',
        )
    ],
    paginationItemsPerPage: 5,
    provider: EntityToDtoStateProvider::class,
    processor: EntityClassDtoStateProcessor::class,
    stateOptions: new Options(entityClass: Element::class),
)]
class ElementRessource
{

    public ?string $name = null;
    public ?string $content = null;
    public ?string $description = null;
    public ?string $locate = null;
    public ?string $price = null;
    public ?string $size = null;
    public ?\DateTime $createdDate = null;

    public ?int $verified = null;

    public ?string $exactLocate = null;

    public ?string $desired = null;
    public ?string $city = null;
}