<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Case Types
    Route::delete('case-types/destroy', 'CaseTypeController@massDestroy')->name('case-types.massDestroy');
    Route::resource('case-types', 'CaseTypeController');

    // Case Statuses
    Route::delete('case-statuses/destroy', 'CaseStatusController@massDestroy')->name('case-statuses.massDestroy');
    Route::resource('case-statuses', 'CaseStatusController');

    // Action Types
    Route::delete('action-types/destroy', 'ActionTypeController@massDestroy')->name('action-types.massDestroy');
    Route::resource('action-types', 'ActionTypeController');

    // Staff
    Route::delete('staff/destroy', 'StaffController@massDestroy')->name('staff.massDestroy');
    Route::resource('staff', 'StaffController');

    // Com Depts
    Route::delete('com-depts/destroy', 'ComDeptController@massDestroy')->name('com-depts.massDestroy');
    Route::resource('com-depts', 'ComDeptController');

    // Report Types
    Route::delete('report-types/destroy', 'ReportTypeController@massDestroy')->name('report-types.massDestroy');
    Route::resource('report-types', 'ReportTypeController');

    // Case Infos
    Route::delete('case-infos/destroy', 'CaseInfoController@massDestroy')->name('case-infos.massDestroy');
    Route::resource('case-infos', 'CaseInfoController');
     Route::post('cases/case-infos', 'CaseInfoController@search');

    
    
     // Party Types
    Route::delete('party-types/destroy', 'PartyTypeController@massDestroy')->name('party-types.massDestroy');
    Route::resource('party-types', 'PartyTypeController');

    // Case Parties
    Route::delete('case-parties/destroy', 'CasePartiesController@massDestroy')->name('case-parties.massDestroy');
    Route::resource('case-parties', 'CasePartiesController');
//Route::get('/case-parties-create/{id}', function ($id) {
//     echo 'User '.$id;
//});
    Route::get('/case-parties-create/{id}', 'CasePartiesController@create');
    // Case Action Takens
    Route::delete('case-action-takens/destroy', 'CaseActionTakenController@massDestroy')->name('case-action-takens.massDestroy');
    Route::resource('case-action-takens', 'CaseActionTakenController');
    Route::get('/case-action-takens-create/{id}', 'CaseActionTakenController@create');

    
    
    // Case Notes
    Route::delete('case-notes/destroy', 'CaseNotesController@massDestroy')->name('case-notes.massDestroy');
    Route::resource('case-notes', 'CaseNotesController');
 Route::get('/case-notes-create/{id}', 'CaseNotesController@create');
    // Doc Types
    Route::delete('doc-types/destroy', 'DocTypeController@massDestroy')->name('doc-types.massDestroy');
    Route::resource('doc-types', 'DocTypeController');

    // Case Court Decisions
    Route::delete('case-court-decisions/destroy', 'CaseCourtDecisionsController@massDestroy')->name('case-court-decisions.massDestroy');
    Route::resource('case-court-decisions', 'CaseCourtDecisionsController');

    Route::get('/case-court-decisions-create/{id}', 'CaseCourtDecisionsController@create');
    
    // Com Currencies
    Route::delete('com-currencies/destroy', 'ComCurrencyController@massDestroy')->name('com-currencies.massDestroy');
    Route::resource('com-currencies', 'ComCurrencyController');

    // Case Payments
    Route::delete('case-payments/destroy', 'CasePaymentsController@massDestroy')->name('case-payments.massDestroy');
    Route::resource('case-payments', 'CasePaymentsController');
    Route::get('/case-payments-create/{id}', 'CasePaymentsController@create');

    
    
    // Doc Borrowers
    Route::delete('doc-borrowers/destroy', 'DocBorrowerController@massDestroy')->name('doc-borrowers.massDestroy');
    Route::resource('doc-borrowers', 'DocBorrowerController');

    // Case Documents
    Route::delete('case-documents/destroy', 'CaseDocumentsController@massDestroy')->name('case-documents.massDestroy');
    Route::post('case-documents/media', 'CaseDocumentsController@storeMedia')->name('case-documents.storeMedia');
    Route::post('case-documents/ckmedia', 'CaseDocumentsController@storeCKEditorImages')->name('case-documents.storeCKEditorImages');
    Route::resource('case-documents', 'CaseDocumentsController');
 Route::get('/case-documents-create/{id}', 'CaseDocumentsController@create');
    // Out Documents
    Route::delete('out-documents/destroy', 'OutDocumentsController@massDestroy')->name('out-documents.massDestroy');
    Route::resource('out-documents', 'OutDocumentsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
