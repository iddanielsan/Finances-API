<?php

namespace App\Repositories\Eloquent;

use App\Models\Income;
use App\Repositories\Contracts\IncomeRepository;

class EloquentIncomeRepository extends EloquentBaseRepository implements IncomeRepository
{
    protected $income;

    public function __construct(Income $income)
    {
        parent::__construct($income);
        $this->income = $income;
    }

    public function makeIncome($request) {
        return $this->income->create($request->all());
    }

    public function destroyIncome($id)
    {
        $income = $this->income->find($id);

        if (auth()->user()->id === $income->user_id) {
            $income->delete();
        }
    }
}
