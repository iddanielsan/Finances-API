<?php

namespace App\Repositories\Contracts;

/**
 * Interface IncomeRepository.
 */
interface IncomeRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function makeIncome($request);

    public function destroyIncome($id);

    public function listIncomes();
}
