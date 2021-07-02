<div>
    <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                        <a href="{{ route('home') }}">  <span
                class="logo-name"><i class="fa fa-home" aria-hidden="true"></i></i>Inventory</span>
            </a>
            </div>
            <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="{{ route('home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        {{-- <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="briefcase"></i><span>Settings</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{route('supplier.index')}}"><i class="fas fa-users"></i>Supplier Manage</a></li>
                                    <li><a class="nav-link" href="{{route('customer.index')}}"><i class="fas fa-users"></i>Customer Manage</a></li>
                                    <li><a class="nav-link" href="{{route('rack.index')}}"><i class="fas fa-cubes"></i>Rack Manage</a></li>
                                    @can('product-list')
                                    <li><a class="nav-link" href="{{route('product.index')}}"><i class="fas fa-cart-plus"></i>Product Manage</a></li>
                                    @endcan

                                    @can('product-list')
                                    <li><a class="nav-link" href="{{route('import.list')}}"><i class="fas fa-cart-plus"></i> Warehouse Upload</a></li>
                                    @endcan
                                    @can('product-list')
                                    <li><a class="nav-link" href="{{route('sr_import.list')}}"><i class="fas fa-cart-plus"></i> Showroom Upload</a></li>
                                    @endcan
                                    <li><a class="nav-link" href="{{route('wirehouse.index')}}"><i class="fas fa-cubes"></i>Wirehouse Manage</a></li>
                                </ul>
                        </li> --}}
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-cart"></i><span>Sales </span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('invoice.create')}}">New Sale </a></li>
                                <li><a class="nav-link" href="{{route('invoice.index')}}">Sales Manage</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user"></i><span>Customer</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{route('customer.create')}}"></i>Add Customer </a></li>
                                    <li><a class="nav-link" href="{{route('customer.index')}}"></i>Customer Manage</a></li>
                                    <li><a class="nav-link" href="{{route('customer.all_dues')}}">Due Customer</a></li>
                                    <li><a class="nav-link" href="{{route('customer.all_paid')}}">Paid Customer</a></li>
                                    <li><a class="nav-link" href="{{route('customer.index')}}">Customer Ledger</a></li>
                                </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user"></i><span>Supplier</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{route('supplier.create')}}"></i>Add supplier </a></li>
                                    <li><a class="nav-link" href="{{route('supplier.index')}}"></i>Supplier Manage</a></li>
                                    <li><a class="nav-link" href="{{route('supplier.all_dues')}}">Due Supplier</a></li>
                                    <li><a class="nav-link" href="{{route('supplier.all_dues')}}">Paid Supplier</a></li>
                                    <li><a class="nav-link" href="{{route('supplier.index')}}">Supplier Ledger</a></li>
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="star"></i><span>Product</span></a>
                                <ul class="dropdown-menu">
                                    
                                    @can('product-list')
                                    <li><a class="nav-link" href="{{route('product.index')}}"><i class="fas fa-cart-plus"></i>Product Manage</a></li>
                                    @endcan
                                    @can('product-list')
                                    <li><a class="nav-link" href="{{route('import.list')}}"><i class="fas fa-cart-plus"></i> Add Product(WH)</a></li>
                                    @endcan
                                    @can('product-list')
                                    <li><a class="nav-link" href="{{route('sr_import.list')}}"><i class="fas fa-cart-plus"></i>Add Product (SR)</a></li>
                                    @endcan
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="shopping-bag"></i><span>Purchase</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{route('purchase.create')}}">Add Purchase </a></li>
                                    <li><a class="nav-link" href="{{route('purchase.index')}}">Purchase Manage</a></li>
                                </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layers"></i><span>Stock </span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('stock.index')}}">Stock  Report</a></li>
                            </ul>
                        </li>
                        {{-- <li class="menu-header">Payment and Sales</li> --}}
                        
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span>Payment Module</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('customer.payment')}}"><i class="fas fa-cart-plus"></i>Customer Payment</a></li>  
                            </ul>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('supplier.payment')}}"><i class="fas fa-cart-plus"></i>Supplier Payment</a></li>  
                            </ul>
                        </li>
                     
                        <li class="menu-header">Report Section</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Report Module</span></a>
                            <ul class="dropdown-menu">
                            
                            <li><a class="nav-link" href="{{route('customer.all_dues')}}">Customer Dues Report</a></li>
                            <li><a class="nav-link" href="{{route('supplier.all_dues')}}">Supplier Dues Report</a></li>
                            <li><a class="nav-link" href="{{route('purchase.manage')}}">All Purchase Report</a></li>
                            <li><a class="nav-link" href="{{route('transfer.list')}}">All Transfer Report</a></li>
                            <li><a class="nav-link" href="{{route('sales.allsales')}}">All Sales Reports</a></li>
                            <li><a class="nav-link" href="{{route('stock.warehouse')}}">  Warehouse Report</a></li>
                            <li><a class="nav-link" href="{{route('stock.showroom')}}">  Showroom Report</a></li>
                            <li><a class="nav-link" href="{{route('stock.wh_sr')}}">  Warehouse + Showroom </a></li>
                            <li><a class="nav-link" href="{{route('warehouse.summary')}}">  Warehouse Summary </a></li>
                                
                            </ul>
                        </li>

                        {{-- <li class="menu-header">Employee & Attendance</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Employee</span></a>
                            <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{route('employee.index')}}">Employee Manage</a></li>
                            <li><a class="nav-link" href="{{route('customer.all_dues')}}">Customer Dues List</a></li>
                            <li><a class="nav-link" href="{{route('invoice.sale')}}">Manage Comapny Invoice</a></li>
                                
                            </ul>
                        </li> --}}
                        <li class="menu-header">Accounts Module</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="activity"></i><span>Accounts</span></a>
                            <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{route('account_group.index')}}">Account Group</a></li>
                            <li><a class="nav-link" href="{{route('chart_of_account.index')}}">Chart of Account</a></li>
                            <li><a class="nav-link" href="{{route('voucher.index')}}">All Vouchers</a></li>
                            <li><a class="nav-link" href="{{route('general-ledger.index')}}">Ledger Report</a></li>
                            <li><a class="nav-link" href="{{route('general-ledger.trail')}}">Trail Balance</a></li>
                            <li><a class="nav-link" href="{{route('general-ledger.income')}}">Income Statment</a></li>
                            <li><a class="nav-link" href="{{route('general-ledger.balance')}}">Balance Sheet</a></li>
                            <li><a class="nav-link" href="{{route('chart_account.index')}}">Chart Account</a></li>
                            {{-- <li><a class="nav-link" href="{{route('chart_account.create')}}">Summary Report</a></li> --}}
                                
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Bank</span></a>
                            <ul class="dropdown-menu">
                               
                            <li><a class="nav-link" href="{{route('bank.index')}}"> Manage Bank </a></li>     
                            <li><a class="nav-link" href="{{route('bank_ledger.index')}}"> Bank Transction</a></li> 
                      
                            </ul>
                        </li>
                         <li class="menu-header">Human Resource</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Employee</span></a>
                            <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{route('designation.create')}}">Add Designation </a></li>     
                            <li><a class="nav-link" href="{{route('designation.index')}}">Designation Manage </a></li>     
                            <li><a class="nav-link" href="{{route('employee.create')}}">Add Employee </a></li>     
                            <li><a class="nav-link" href="{{route('employee.index')}}">Employee Manage</a></li>     
                            </ul>
                        </li>

                        <li class="menu-header">Adminastration Section</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Users</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>  
                                <li><a class="nav-link" href="{{ route('permission.index') }}">Manage Permission</a></li>  
                            </ul>
                        </li>         
            </ul>
     </aside>
</div>