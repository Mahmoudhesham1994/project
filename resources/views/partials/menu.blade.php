<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('main_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/case-infos*") ? "menu-open" : "" }} {{ request()->is("admin/case-parties*") ? "menu-open" : "" }} {{ request()->is("admin/case-action-takens*") ? "menu-open" : "" }} {{ request()->is("admin/case-notes*") ? "menu-open" : "" }} {{ request()->is("admin/case-documents*") ? "menu-open" : "" }} {{ request()->is("admin/case-court-decisions*") ? "menu-open" : "" }} {{ request()->is("admin/case-payments*") ? "menu-open" : "" }} {{ request()->is("admin/out-documents*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-home">

                            </i>
                            <p>
                                {{ trans('cruds.main.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('case_info_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-infos.index") }}" class="nav-link {{ request()->is("admin/case-infos") || request()->is("admin/case-infos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-balance-scale">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseInfo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('case_party_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-parties.index") }}" class="nav-link {{ request()->is("admin/case-parties") || request()->is("admin/case-parties/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseParty.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('case_action_taken_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-action-takens.index") }}" class="nav-link {{ request()->is("admin/case-action-takens") || request()->is("admin/case-action-takens/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-grip-horizontal">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseActionTaken.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('case_note_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-notes.index") }}" class="nav-link {{ request()->is("admin/case-notes") || request()->is("admin/case-notes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-sticky-note">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseNote.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('case_document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-documents.index") }}" class="nav-link {{ request()->is("admin/case-documents") || request()->is("admin/case-documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseDocument.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('case_court_decision_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-court-decisions.index") }}" class="nav-link {{ request()->is("admin/case-court-decisions") || request()->is("admin/case-court-decisions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-gavel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseCourtDecision.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('case_payment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-payments.index") }}" class="nav-link {{ request()->is("admin/case-payments") || request()->is("admin/case-payments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-money-bill-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.casePayment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('out_document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.out-documents.index") }}" class="nav-link {{ request()->is("admin/out-documents") || request()->is("admin/out-documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.outDocument.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/case-types*") ? "menu-open" : "" }} {{ request()->is("admin/case-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/action-types*") ? "menu-open" : "" }} {{ request()->is("admin/staff*") ? "menu-open" : "" }} {{ request()->is("admin/doc-types*") ? "menu-open" : "" }} {{ request()->is("admin/party-types*") ? "menu-open" : "" }} {{ request()->is("admin/com-currencies*") ? "menu-open" : "" }} {{ request()->is("admin/com-depts*") ? "menu-open" : "" }} {{ request()->is("admin/report-types*") ? "menu-open" : "" }} {{ request()->is("admin/doc-borrowers*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-wrench">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('case_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-types.index") }}" class="nav-link {{ request()->is("admin/case-types") || request()->is("admin/case-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('case_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.case-statuses.index") }}" class="nav-link {{ request()->is("admin/case-statuses") || request()->is("admin/case-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caseStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('action_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.action-types.index") }}" class="nav-link {{ request()->is("admin/action-types") || request()->is("admin/action-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.actionType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('staff_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.staff.index") }}" class="nav-link {{ request()->is("admin/staff") || request()->is("admin/staff/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.staff.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('doc_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.doc-types.index") }}" class="nav-link {{ request()->is("admin/doc-types") || request()->is("admin/doc-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.docType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('party_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.party-types.index") }}" class="nav-link {{ request()->is("admin/party-types") || request()->is("admin/party-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partyType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('com_currency_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.com-currencies.index") }}" class="nav-link {{ request()->is("admin/com-currencies") || request()->is("admin/com-currencies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.comCurrency.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('com_dept_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.com-depts.index") }}" class="nav-link {{ request()->is("admin/com-depts") || request()->is("admin/com-depts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.comDept.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('report_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.report-types.index") }}" class="nav-link {{ request()->is("admin/report-types") || request()->is("admin/report-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.reportType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('doc_borrower_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.doc-borrowers.index") }}" class="nav-link {{ request()->is("admin/doc-borrowers") || request()->is("admin/doc-borrowers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.docBorrower.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>