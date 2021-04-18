<?php

namespace App\Services;

use App\Repositories\Contract\PaymentRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\MemberPayment;
use Auth;

class PaymentService implements ServiceInterface
{

    protected $paymentRepository;
    function __construct(paymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }
    public function fetchAll()
    {
        $payments = $this->paymentRepository->fetchAll();

        return $payments;
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
            'member_id'=>$data['member_id'],
            // 'fname' => $data['fname'],
            // 'lname' => $data['lname'],
            'date'=> $data['date'],
            'payment_type_id' => $data['payment_type_id'],
            'amount' => $data['amount'],
            'created_by' =>Auth::id(),
            'updated_by' =>Auth::id(),
        ];
        return $this->paymentRepository->create($array);
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
        return $this->paymentRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->paymentRepository->delete($id);
    }
}
