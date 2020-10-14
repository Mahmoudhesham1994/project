<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Case Types
    Route::apiResource('case-types', 'CaseTypeApiController');

    // Case Statuses
    Route::apiResource('case-statuses', 'CaseStatusApiController');

    // Action Types
    Route::apiResource('action-types', 'ActionTypeApiController');

    // Staff
    Route::apiResource('staff', 'StaffApiController');

    // Com Depts
    Route::apiResource('com-depts', 'ComDeptApiController');

    // Report Types
    Route::apiResource('report-types', 'ReportTypeApiController');

    // Case Infos
    Route::apiResource('case-infos', 'CaseInfoApiController');

    // Party Types
    Route::apiResource('party-types', 'PartyTypeApiController');

    // Case Parties
    Route::apiResource('case-parties', 'CasePartiesApiController');

    // Case Action Takens
    Route::apiResource('case-action-takens', 'CaseActionTakenApiController');

    // Case Notes
    Route::apiResource('case-notes', 'CaseNotesApiController');

    // Doc Types
    Route::apiResource('doc-types', 'DocTypeApiController');

    // Case Court Decisions
    Route::apiResource('case-court-decisions', 'CaseCourtDecisionsApiController');

    // Com Currencies
    Route::apiResource('com-currencies', 'ComCurrencyApiController');

    // Case Payments
    Route::apiResource('case-payments', 'CasePaymentsApiController');

    // Doc Borrowers
    Route::apiResource('doc-borrowers', 'DocBorrowerApiController');

    // Case Documents
    Route::post('case-documents/media', 'CaseDocumentsApiController@storeMedia')->name('case-documents.storeMedia');
    Route::apiResource('case-documents', 'CaseDocumentsApiController');

    // Out Documents
    Route::apiResource('out-documents', 'OutDocumentsApiController');
});
