<?php

namespace App\Services;
use App\Repositories\Contracts\IncomeRepository;
use InvalidArgumentException;

class IncomeService {
    public function __construct(IncomeRepository $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }

    public function store($request)
    {
        try {
            return $this->incomeRepository->makeIncome($request);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException('Unable to create income.');
        }

    }

    public function destroy($id)
    {
        try {
            $this->incomeRepository->destroyIncome($id);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException('Unable to delete income.');
        }
    }
}
