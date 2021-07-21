<?php

namespace Crystal\StateChangeStrategy;

use Crystal\Crystal;
use Exception;

use Crystal\Exception\CrystalTaskStateErrorException;
use Crystal\Entity\CrystalTask;

class RunningToErrorStateChangeStrategy implements StateChangeStrategyInterface
{
    public function isDirtyShouldContinue(bool $isDirty): bool
    {
        if ($isDirty) {
            return false;
        }
        return true;
    }

    /**
     * This would be weird, as EXECUTE is the only one using this
     */
    public function stateNotChangedShouldContinue(bool $stateChanged): bool
    {
        if (!$stateChanged) {
            return false;
        }
        return true;
    }

    /**
     * @throws Exception
     */
    public function changeState(CrystalTask $crystalTask): bool
    {
        try {
            $crystalTask->stateRunningToError();
        } catch (CrystalTaskStateErrorException $e) {
            Crystal::$logger->error('CRYSTAL-0019: RunningToErrorStateChangeStrategy state changed', [
                'crystalTask' => $crystalTask,
                'errorMessage' => $e->getMessage(),
            ]);
            return false;
        }
        return true;
    }
}