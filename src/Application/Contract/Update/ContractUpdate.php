<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 9:00
 */

namespace App\Application\Contract\Update;

use App\Domain\Model\Contract\Contract;
use App\Domain\Services\Contract\ContractUpdateService;

class ContractUpdate
{
    private $contractUpdateService;

    public function __construct(ContractUpdateService $contractUpdateService)
    {
        $this->contractUpdateService = $contractUpdateService;
    }

    /**
     * @param ContractUpdateCommand $contractUpdateCommand
     */
    public function handle(ContractUpdateCommand $contractUpdateCommand)
    {
        $this->contractUpdateService->__invoke(new Contract($contractUpdateCommand->id(),
                                                            $contractUpdateCommand->endDate(),
                                                            $contractUpdateCommand->renovation(),
                                                            $contractUpdateCommand->startDate())
                                                        );
    }
}