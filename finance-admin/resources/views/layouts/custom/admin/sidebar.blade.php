<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ route('/') }}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/rkive1.png') }}" alt=""
                    style="height: 40px; width: auto;"><img class="img-fluid for-dark"
                    src="{{ asset('assets/images/logo/rkive1.png') }}" alt=""
                    style="height: 40px; width: auto"></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('/') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo1.png') }}" alt=""
                    style="height: 35px; width: auto;"></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('admin') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Dashboard</span></a></li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="#" data-bs-original-title=""
                            title="">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"></use>
                            </svg><span>Ledger</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="">
                            <li><a href="{{ route('admin.budgets') }}" data-bs-original-title=""
                                    title="">Budgets</a></li>
                            <li><a href="{{ route('admin.addbudgets') }}" data-bs-original-title=""
                                    title="">Additional Budget</a></li>
                            <li><a href="{{ route('admin.cashflow') }}" data-bs-original-title=""
                                    title="">Cashflow</a></li>
                            <li><a href="{{ route('admin.balance') }}" data-bs-original-title=""
                                    title="">Balance</a></li>
                            <li><a href="{{ route('admin.income') }}" data-bs-original-title=""
                                    title="">Income</a></li>
                            <li><a href="{{ route('admin.payable') }}" data-bs-original-title=""
                                    title="">Payable</a></li>
                            <li><a href="{{ route('admin.recievable') }}" data-bs-original-title=""
                                    title="">Receivable</a></li>
                            <li><a href="{{ route('admin.turnover') }}" data-bs-original-title=""
                                    title="">Turnover</a></li>
                            <li><a href="{{ route('admin.sales') }}" data-bs-original-title="" title="">Sales</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="#" data-bs-original-title=""
                            title="">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-task') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-task') }}"></use>
                            </svg><span>Budget Plans</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="">
                            <li><a href="{{ route('admin.budgetPlan') }}" data-bs-original-title=""
                                    title="">Current
                                    Budget Plan</a></li>
                            {{-- <li><a href="{{ route('budget-plan.create') }}" data-bs-original-title=""
                                    title="">Create Budget Plan</a></li>
                            <li><a href="{{ route('admin.cashflow') }}" data-bs-original-title="" title="">Budget
                                    Plan History</a></li> --}}
                            <li><a href="{{ route('admin.budgetExpense') }}" data-bs-original-title=""
                                    title="">Expense</a></li>

                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="#" data-bs-original-title=""
                            title="">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-widget') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-widget') }}"></use>
                            </svg><span>Company</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="">
                            <li><a href="{{ route('admin.roles') }}" data-bs-original-title=""
                                    title="">Roles</a>
                            </li>
                            <li><a href="{{ route('admin.department') }}" data-bs-original-title=""
                                    title="">Department</a>
                            </li>
                            <li><a href="{{ route('admin.users') }}" data-bs-original-title=""
                                    title="">Users</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="{{ route('admin.analytics') }}" target="_self">
                            <i data-feather="bar-chart"></i>
                            <span>Analytics </span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="{{ route('admin.report') }}" target="_self">
                            <i data-feather="file"></i>
                            <span>Reporting </span></a></li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="#" data-bs-original-title=""
                            title="">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"></use>
                            </svg><span>Travel</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="">
                            <li><a href="{{ route('travel.index') }}" data-bs-original-title=""
                                    title="">Travel Requests</a></li>
                            <li><a href="{{ route('travel-expense.index') }}" data-bs-original-title=""
                                    title="">Travel Expenses</a></li>
                            <li><a href="{{ route('admin.cashflow') }}" data-bs-original-title=""
                                    title="">Expense Reports</a></li>

                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="#" data-bs-original-title=""
                            title="">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-faq') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-faq') }}"></use>
                            </svg><span>Terms & Conditions</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="">
                            <li><a href="{{ route('policy') }}" data-bs-original-title="" title="">Policy</a>
                            </li>
                            <li><a href="{{ route('responsibility') }}" data-bs-original-title=""
                                    title="">Responsibility</a>
                            </li>
                            <li><a href="{{ route('punishment') }}" data-bs-original-title=""
                                    title="">Punishment</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
