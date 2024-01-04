<?php

use App\Models\UserJobApplicationStep;

function saveUserJobApplicationStep($step, $status, $userId)
{
  $js = new UserJobApplicationStep();
  $js->step = $step;
  $js->status = $status;
  $js->user_id = $userId;
  $js->save();
}
