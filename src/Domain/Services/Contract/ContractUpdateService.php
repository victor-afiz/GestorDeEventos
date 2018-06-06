<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 8:44
 */

namespace App\Domain\Services\Contract;

use App\Domain\Model\Contract\Contract;
use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Model\Contract\Exceptions\ContractUserDonsentExistsException;
use App\Domain\Model\Contract\Exceptions\DateIsOldException;

class ContractUpdateService
{
    private $repository;

    public function __construct(ContractRepository $contractRepository)
    {
        $this->repository = $contractRepository;
    }

    /**
     * @param Contract $contract
     */
    public function __invoke(Contract $contract)
    {
        $oldContract = $this->repository->findByUserId($contract->getUserID());
        if (empty($oldContract))
            throw new ContractUserDonsentExistsException();

        if (CheckDateService::execute($contract->getEndDate()))
            throw new DateIsOldException(date_format($contract->getEndDate(), 'd-m-Y'));

        $oldContract->setEndDate($contract->getEndDate()->format('d-m-Y'));
        $oldContract->setStartDate($contract->getStartDate()->format('d-m-Y'));
        $oldContract->setRenovation($contract->getRenovation());

        $this->repository->updateAll();
    }
}