<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 9:00
 */

namespace App\Application\Contract\Update;


class ContractUpdateCommand
{
    private $id;
    private $endDate;
    private $renovation;
    private $startDate;

    /**
     * ContractCreateCommand constructor.
     * @param $id
     * @param $endDate
     * @param $renovation
     */
    public function __construct($id, $endDate, $renovation, $startDate)
    {
        $this->id = $id;
        $this->endDate = $endDate;
        $this->renovation = $renovation;
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function endDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function renovation()
    {
        return $this->renovation;
    }

    /**
     * @return mixed
     */
    public function startDate()
    {
        return $this->startDate;
    }

}