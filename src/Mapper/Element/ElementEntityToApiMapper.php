<?php

namespace App\Mapper\Element;

use App\ApiResource\ElementRessource;
use App\Entity\Element;
use App\Repository\ElementRepository;
use Symfonycasts\MicroMapper\AsMapper;
use Symfonycasts\MicroMapper\MapperInterface;

#[AsMapper(from: Element::class,to: ElementRessource::class)]
class ElementEntityToApiMapper implements MapperInterface
{

    public function __construct(
        private ElementRepository $elementRepository,
    )
    {
    }
    public function load(object $from, string $toClass, array $context): object
    {
        $dto = $from;
        assert($dto instanceof ElementRessource);
        $elementEntity = $dto->id ? $this->elementRepository->find($dto->id) : new Element();
        if (!$elementEntity) {
            throw new \Exception('Element not found');
        }
        return $elementEntity;
    }

    public function populate(object $from, object $to, array $context): object
    {
        $entity = $from;
        $dto = $to;
        assert($entity instanceof Element);
        assert($dto instanceof ElementRessource);
        $dto->name = $entity->getName();
        $dto->content = $entity->getContent();
        $dto->description = $entity->getDescription();
        $dto->locate = $entity->getLocate();
        $dto->price = $entity->getPrice();
        $dto->size = $entity->getSize();
        $dto->createdDate = $entity->getCreatedDate();
        $dto->verified = $entity->getCreatedDate();
        $dto->exactLocate = $entity->getExactLocate();
        $dto->desired = $entity->getDesired();
        $dto->city = $entity->getCity();

        return $dto;
    }
}