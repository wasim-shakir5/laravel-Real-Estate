<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('admin_assets/img/icons/dashboard.svg') }}" alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/product.svg') }}" alt="img"><span>
                            Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('list.product') }}">Product List</a></li>
                        <li><a href="{{ route('create.product') }}">Add Product</a></li>
                        <li><a href="{{ route('list.category') }}">Category</a></li>
                        <li><a href="{{ route('list.brand') }}">Brand</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset("admin_assets/img/icons/users1.svg") }}" alt="img"><span>
                            People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="customerlist.html">Customer List</a></li>
                        <li><a href="addcustomer.html">Add Customer </a></li>
                        <li><a href="supplierlist.html">Supplier List</a></li>
                        <li><a href="addsupplier.html">Add Supplier </a></li>
                        <li><a href="userlist.html">User List</a></li>
                        <li><a href="adduser.html">Add User</a></li>
                        <li><a href="storelist.html">Store List</a></li>
                        <li><a href="addstore.html">Add Store</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/settings.svg') }}" alt="img"><span>
                            Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="generalsettings.html">General Settings</a></li>
                        <li><a href="emailsettings.html">Email Settings</a></li>
                        <li><a href="paymentsettings.html">Payment Settings</a></li>
                        <li><a href="currencysettings.html">Currency Settings</a></li>
                        <li><a href="grouppermissions.html">Group Permissions</a></li>
                        <li><a href="taxrates.html">Tax Rates</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    // Include this in your custom.js or within a script tag in your layout file

$(document).ready(function() {
    // Add active class based on current URL
    var currentUrl = window.location.href;

    $('#sidebar-menu ul li a').each(function() {
        var $this = $(this);

        if ($this.attr('href') === currentUrl) {
            $this.addClass('active'); // Add active class to the current link
            $this.closest('ul').parent().addClass('subdrop'); // Open the submenu
        }
    });

    // Handle submenu toggle on click
    $('.submenu > a').on('click', function(e) {
        e.preventDefault();
        var $parent = $(this).parent();
        var $submenu = $parent.find('ul');

        if ($parent.hasClass('subdrop')) {
            $submenu.slideUp(200, function() {
                $parent.removeClass('subdrop');
            });
        }
    });
});

</script>
