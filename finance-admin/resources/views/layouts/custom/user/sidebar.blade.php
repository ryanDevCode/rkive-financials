<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ route('/') }}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/rkive1.png') }}" alt=""
                    style="height: 35px; width: auto;"><img class="img-fluid for-dark"
                    src="{{ asset('assets/images/logo/rkive1.png') }}" alt=""
                    style="height: 35px; width: auto;"></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('/') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo1.png') }}" alt="" style="height:35px; width:35"></a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('user') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Dashboard</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('user') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Budget Requests</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('user') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Expense Report</span></a></li>
                    {{-- <li class="sidebar-list">
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
                            <li><a href="{{ route('user.budgets') }}" data-bs-original-title=""
                                    title="">Budgets</a></li>
                            <li><a href="{{ route('user.addbudgets') }}" data-bs-original-title=""
                                    title="">Budget Request</a></li>
                            <li><a href="{{ route('user.cashflow') }}" data-bs-original-title=""
                                    title="">Cashflow</a></li>
                            <li><a href="{{ route('user.balance') }}" data-bs-original-title=""
                                    title="">Balance</a></li>
                            <li><a href="{{ route('user.income') }}" data-bs-original-title=""
                                    title="">Income</a></li>
                            <li><a href="{{ route('user.payable') }}" data-bs-original-title=""
                                    title="">Payable</a></li>
                            <li><a href="{{ route('user.recievable') }}" data-bs-original-title=""
                                    title="">Receivable</a></li>
                            <li><a href="{{ route('user.turnover') }}" data-bs-original-title=""
                                    title="">Turnover</a></li>
                            <li><a href="{{ route('user.sales') }}" data-bs-original-title="" title="">Sales</a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('user.analytics') }}"
                            target="_self">
                            <i data-feather="bar-chart"></i>
                            <span>Analytics </span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('user.analytics') }}"
                            target="_self">
                            <i data-feather="bar-chart"></i>
                            <span>Policy </span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
