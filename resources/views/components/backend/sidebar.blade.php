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
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Settings</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('supplier.index')}}"><i class="fas fa-users"></i>Supplier Manage</a></li>
                                <li><a class="nav-link" href="{{route('customer.index')}}"><i class="fas fa-users"></i>Customer Manage</a></li>
                                <li><a class="nav-link" href="{{route('rack.index')}}"><i class="fas fa-cubes"></i>Rack Manage</a></li>
                                <li><a class="nav-link" href="{{route('product.index')}}"><i class="fas fa-cart-plus"></i>Product Manage</a></li>
                                <li><a class="nav-link" href="{{route('wirehouse.index')}}"><i class="fas fa-cubes"></i>Wirehouse Manage</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Purchase Module</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('purchase.index')}}">Purchase Invoice</a></li>
                                <li><a class="nav-link" href="{{route('purchase.manage')}}">All Purchase Report</a></li>
                                
                                <li><a class="nav-link" href="{{route('stock.index')}}">Stock  Manage</a></li>
                              
                            </ul>
                        </li>
                        <li class="menu-header">Payment and Sales</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Sales Module</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('invoice.index')}}"><i class="fas fa-cart-plus"></i>Sales Invoice</a></li>
                                <li><a class="nav-link" href="{{route('sales.allsales')}}">All Sales Reports</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Payment </span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('customer.payment')}}"><i class="fas fa-cart-plus"></i>Customer Payment</a></li>  
                            </ul>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('supplier.payment')}}"><i class="fas fa-cart-plus"></i>Supplier Payment</a></li>  
                            </ul>
                        </li>
                     
                        <li class="menu-header">Report Section</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Due Report Module</span></a>
                            <ul class="dropdown-menu">
    
                            <li><a class="nav-link" href="{{route('customer.all_dues')}}">Customer Dues List</a></li>
                            <li><a class="nav-link" href="{{route('supplier.all_dues')}}">Supplier Dues List</a></li>
                                
                            </ul>
                        </li>

                        <li class="menu-header">Employee & Attendance</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Employee</span></a>
                            <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{route('employee.index')}}">Employee Manage</a></li>
                            <li><a class="nav-link" href="{{route('customer.all_dues')}}">Customer Dues List</a></li>
                            <li><a class="nav-link" href="{{route('invoice.sale')}}">Manage Comapny Invoice</a></li>
                                
                            </ul>
                        </li>

                        <li class="menu-header">Adminastration Section</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Users</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                                
                            </ul>
                        </li>         
            </ul>
     </aside>
</div>