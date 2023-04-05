<?php

namespace ManageBills\Action;

class PayBillAction
{
public function handle(): void
  {
    $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $BillRepository = BillRepositoryFactory::make();
    $Bill = $BillRepository->find($id);
    $bill->paid();
    $billRepository->store($bill);

    header('Location: /index.php');
  }
}