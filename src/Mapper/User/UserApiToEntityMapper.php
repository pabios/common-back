<?php

namespace App\Mapper\User;

use App\ApiResource\UserRessource;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfonycasts\MicroMapper\AsMapper;
use Symfonycasts\MicroMapper\MapperInterface;
use Symfonycasts\MicroMapper\MicroMapperInterface;

#[AsMapper(from: UserRessource::class,to: User::class)]
class UserApiToEntityMapper implements MapperInterface
{

    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $userPasswordHasher,
        private MicroMapperInterface $microMapper,
    )
    {
    }

    public function load(object $from, string $toClass, array $context): object
    {
        $dto = $from;
        assert($dto instanceof UserRessource);

        $userEntity = $dto->id ? $this->userRepository->find($dto->id) : new User();
        if (!$userEntity) {
            throw new \Exception('User not found');
        }

        return $userEntity;
    }

    public function populate(object $from, object $to, array $context): object
    {
        $dto = $from;
        assert($dto instanceof UserRessource);
        $entity = $to;
        assert($entity instanceof User);

        $entity->setEmail($dto->email);
        $entity->setFullName($dto->fullName);
        $entity->setTelephone($dto->telephone);
        $entity->setAge($dto->age);
        $entity->setImgUrl($dto->imgUrl);
        $entity->setBadge($dto->badge);
        $entity->setBio($dto->bio);
        if ($dto->password) {
            $entity->setPassword($this->userPasswordHasher->hashPassword($entity, $dto->password));
        }
        //@todo mape siteRessource and load in user
//        $entity->setSiteId($dto->si);


        return $entity;
    }
}

