<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 12:02
 */

namespace App\Domain\Services\Contract;


use App\Domain\Model\Contract\Contract;
use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Model\Contract\Exceptions\ContractDoesntExistException;
use App\Domain\Model\Contract\Exceptions\ContractUserAlreadyExistsException;
use App\Domain\Model\Contract\Exceptions\DateIsOldException;
use App\Domain\Model\User\Exceptions\UserNotFoundException;
use App\Domain\Model\User\UserRepository;

class ContractCreatorService
{
    /**
     * @var ContractRepository
     */
    private $contractRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ContractRepository $contractRepository, UserRepository $userRepository)
    {
        $this->contractRepository = $contractRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke(Contract $contract)
    {
        if(CheckDateService::execute($contract->getEndDate()))
            throw new DateIsOldException(date_format($contract->getEndDate(), 'd-m-Y'));

        $userContract = $this->contractRepository->findByUserId($contract->getUserID());

        if(false === empty($userContract))
            throw new ContractUserAlreadyExistsException();

        $user = $this->userRepository->findById($contract->getUserID());

        if(empty($user))
            throw new UserNotFoundException($contract->getUserID());

        $this->contractRepository->insert($contract);
        $this->contractRepository->updateAll();

    }
}