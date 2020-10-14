<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'main_access',
            ],
            [
                'id'    => 18,
                'title' => 'setting_access',
            ],
            [
                'id'    => 19,
                'title' => 'case_type_create',
            ],
            [
                'id'    => 20,
                'title' => 'case_type_edit',
            ],
            [
                'id'    => 21,
                'title' => 'case_type_show',
            ],
            [
                'id'    => 22,
                'title' => 'case_type_delete',
            ],
            [
                'id'    => 23,
                'title' => 'case_type_access',
            ],
            [
                'id'    => 24,
                'title' => 'case_status_create',
            ],
            [
                'id'    => 25,
                'title' => 'case_status_edit',
            ],
            [
                'id'    => 26,
                'title' => 'case_status_show',
            ],
            [
                'id'    => 27,
                'title' => 'case_status_delete',
            ],
            [
                'id'    => 28,
                'title' => 'case_status_access',
            ],
            [
                'id'    => 29,
                'title' => 'action_type_create',
            ],
            [
                'id'    => 30,
                'title' => 'action_type_edit',
            ],
            [
                'id'    => 31,
                'title' => 'action_type_show',
            ],
            [
                'id'    => 32,
                'title' => 'action_type_delete',
            ],
            [
                'id'    => 33,
                'title' => 'action_type_access',
            ],
            [
                'id'    => 34,
                'title' => 'staff_create',
            ],
            [
                'id'    => 35,
                'title' => 'staff_edit',
            ],
            [
                'id'    => 36,
                'title' => 'staff_show',
            ],
            [
                'id'    => 37,
                'title' => 'staff_delete',
            ],
            [
                'id'    => 38,
                'title' => 'staff_access',
            ],
            [
                'id'    => 39,
                'title' => 'com_dept_create',
            ],
            [
                'id'    => 40,
                'title' => 'com_dept_edit',
            ],
            [
                'id'    => 41,
                'title' => 'com_dept_show',
            ],
            [
                'id'    => 42,
                'title' => 'com_dept_delete',
            ],
            [
                'id'    => 43,
                'title' => 'com_dept_access',
            ],
            [
                'id'    => 44,
                'title' => 'report_type_create',
            ],
            [
                'id'    => 45,
                'title' => 'report_type_edit',
            ],
            [
                'id'    => 46,
                'title' => 'report_type_show',
            ],
            [
                'id'    => 47,
                'title' => 'report_type_delete',
            ],
            [
                'id'    => 48,
                'title' => 'report_type_access',
            ],
            [
                'id'    => 49,
                'title' => 'case_info_create',
            ],
            [
                'id'    => 50,
                'title' => 'case_info_edit',
            ],
            [
                'id'    => 51,
                'title' => 'case_info_show',
            ],
            [
                'id'    => 52,
                'title' => 'case_info_delete',
            ],
            [
                'id'    => 53,
                'title' => 'case_info_access',
            ],
            [
                'id'    => 54,
                'title' => 'party_type_create',
            ],
            [
                'id'    => 55,
                'title' => 'party_type_edit',
            ],
            [
                'id'    => 56,
                'title' => 'party_type_show',
            ],
            [
                'id'    => 57,
                'title' => 'party_type_delete',
            ],
            [
                'id'    => 58,
                'title' => 'party_type_access',
            ],
            [
                'id'    => 59,
                'title' => 'case_party_create',
            ],
            [
                'id'    => 60,
                'title' => 'case_party_edit',
            ],
            [
                'id'    => 61,
                'title' => 'case_party_show',
            ],
            [
                'id'    => 62,
                'title' => 'case_party_delete',
            ],
            [
                'id'    => 63,
                'title' => 'case_party_access',
            ],
            [
                'id'    => 64,
                'title' => 'case_action_taken_create',
            ],
            [
                'id'    => 65,
                'title' => 'case_action_taken_edit',
            ],
            [
                'id'    => 66,
                'title' => 'case_action_taken_show',
            ],
            [
                'id'    => 67,
                'title' => 'case_action_taken_delete',
            ],
            [
                'id'    => 68,
                'title' => 'case_action_taken_access',
            ],
            [
                'id'    => 69,
                'title' => 'case_note_create',
            ],
            [
                'id'    => 70,
                'title' => 'case_note_edit',
            ],
            [
                'id'    => 71,
                'title' => 'case_note_show',
            ],
            [
                'id'    => 72,
                'title' => 'case_note_delete',
            ],
            [
                'id'    => 73,
                'title' => 'case_note_access',
            ],
            [
                'id'    => 74,
                'title' => 'doc_type_create',
            ],
            [
                'id'    => 75,
                'title' => 'doc_type_edit',
            ],
            [
                'id'    => 76,
                'title' => 'doc_type_show',
            ],
            [
                'id'    => 77,
                'title' => 'doc_type_delete',
            ],
            [
                'id'    => 78,
                'title' => 'doc_type_access',
            ],
            [
                'id'    => 79,
                'title' => 'case_court_decision_create',
            ],
            [
                'id'    => 80,
                'title' => 'case_court_decision_edit',
            ],
            [
                'id'    => 81,
                'title' => 'case_court_decision_show',
            ],
            [
                'id'    => 82,
                'title' => 'case_court_decision_delete',
            ],
            [
                'id'    => 83,
                'title' => 'case_court_decision_access',
            ],
            [
                'id'    => 84,
                'title' => 'com_currency_create',
            ],
            [
                'id'    => 85,
                'title' => 'com_currency_edit',
            ],
            [
                'id'    => 86,
                'title' => 'com_currency_show',
            ],
            [
                'id'    => 87,
                'title' => 'com_currency_delete',
            ],
            [
                'id'    => 88,
                'title' => 'com_currency_access',
            ],
            [
                'id'    => 89,
                'title' => 'case_payment_create',
            ],
            [
                'id'    => 90,
                'title' => 'case_payment_edit',
            ],
            [
                'id'    => 91,
                'title' => 'case_payment_show',
            ],
            [
                'id'    => 92,
                'title' => 'case_payment_delete',
            ],
            [
                'id'    => 93,
                'title' => 'case_payment_access',
            ],
            [
                'id'    => 94,
                'title' => 'doc_borrower_create',
            ],
            [
                'id'    => 95,
                'title' => 'doc_borrower_edit',
            ],
            [
                'id'    => 96,
                'title' => 'doc_borrower_show',
            ],
            [
                'id'    => 97,
                'title' => 'doc_borrower_delete',
            ],
            [
                'id'    => 98,
                'title' => 'doc_borrower_access',
            ],
            [
                'id'    => 99,
                'title' => 'case_document_create',
            ],
            [
                'id'    => 100,
                'title' => 'case_document_edit',
            ],
            [
                'id'    => 101,
                'title' => 'case_document_show',
            ],
            [
                'id'    => 102,
                'title' => 'case_document_delete',
            ],
            [
                'id'    => 103,
                'title' => 'case_document_access',
            ],
            [
                'id'    => 104,
                'title' => 'out_document_create',
            ],
            [
                'id'    => 105,
                'title' => 'out_document_edit',
            ],
            [
                'id'    => 106,
                'title' => 'out_document_show',
            ],
            [
                'id'    => 107,
                'title' => 'out_document_delete',
            ],
            [
                'id'    => 108,
                'title' => 'out_document_access',
            ],
            [
                'id'    => 109,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
