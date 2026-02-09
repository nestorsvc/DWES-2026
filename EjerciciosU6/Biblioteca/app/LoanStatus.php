<?php

namespace App;

enum LoanStatus: string {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case RETURNED = 'returned';
    case REJECTED = 'rejected';
}
