<?php

namespace App\Services;

use App\Repositories\Contract\TrainerPaymentRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\TrainerPayment;
use Auth;

class TrainerPaymentService implements ServiceInterface
{

    protected $trainerPaymentRepository;
    function __construct(TrainerPaymentRepositoryInterface $trainerPaymentRepository)
    {
        $this->trainerPaymentRepository = $trainerPaymentRepository;
    }
    public function fetchAll()
    {
        $trainerPayments = $this->trainerPaymentRepository->fetchAll();

        return $trainerPayments;
    }

    /**
     * Fetch User by ID
     *
     * @param [type] $id
     * @return void
     */
    public function fetch($id)
    {
    }

    /**
     * Create new user
     *
     * @param [type] $data
     * @return void
     */
    public function store($data)
    {
        $array = [
            'trainer_id'=>$data['trainer_id'],
            'date'=> $data['date'],
            'amount' => $data['amount'],
            'created_by' =>Auth::id(),
            'updated_by' =>Auth::id(),
        ];
        return $this->trainerPaymentRepository->create($array);
    }

    /**
     * Update existing user
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function update($data, $id)
    {
        return $this->trainerPaymentRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->trainerPaymentRepository->delete($id);
    }
}
