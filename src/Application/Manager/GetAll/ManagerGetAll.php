<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 10:02
 */

namespace App\Application\Manager\GetAll;


use App\Domain\Services\Manager\ManagerGetAllService;

class ManagerGetAll
{
    private $managerGetAllService;
    private $dataTransform;

    public function __construct(ManagerGetAllService $managerGetAllService, ManagerGetAllDataTransform $dataTransform)
    {
        $this->managerGetAllService = $managerGetAllService;
        $this->dataTransform = $dataTransform;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        return $this->dataTransform->transform($this->managerGetAllService->__invoke());
    }
}