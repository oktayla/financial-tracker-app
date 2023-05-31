<?php

namespace App\Enums;

enum TransactionStatus: string
{
    case Income = 'income';
    case Expense = 'expense';
}
