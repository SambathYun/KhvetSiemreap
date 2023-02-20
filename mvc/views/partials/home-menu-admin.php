<ul class="nav-links" class="cl">

	<li class="list" onclick="window.location.href='/khvetsiemreap/Sales/SalesManage'" title="Sales">
		<a class="link-href" href="/khvetsiemreap/Sales/SalesManage">
			<i class="fa fa-shopping-cart cl1" aria-hidden="true"></i>
			<span class="link_name cl ">Sales</span>
		</a>
	</li>
	<li class="list" onclick="window.location.href='/khvetsiemreap/Report/ReportManage'" title="Reports">
		<a class="link-href" href="/khvetsiemreap/Report/ReportManage">
			<i class="fa fa-bar-chart cl2" aria-hidden="true"></i>
			<span class="link_name cl">Reports</span>
		</a>

	</li>

	<li class="list" onclick="window.location.href='/khvetsiemreap/Product/ProductsManage'" title="Products">
		<a class="link-href" href="/khvetsiemreap/Product/ProductsManage">
			<i class="fa fa-cutlery cl3" aria-hidden="true" ></i>
			<span class="link_name cl">Products</span>
		</a>
	</li>

	<li class="list" onclick="window.location.href='/khvetsiemreap/Inventory/InventorysManage'" title="Inventory">
		<a class="link-href" href="/khvetsiemreap/Inventory/InventorysManage" style="text-decoration: none;">
			<i class="fa fa-file-text cl4" aria-hidden="true"></i>
			<span class="link_name cl">Inventorys</span>
		</a>
	</li>
	<li class="list" onclick="window.location.href='/khvetsiemreap/Account/AccountsManage'" title="Accounts">
		<a class="link-href" href="/khvetsiemreap/Account/AccountsManage" style="text-decoration: none;">
			<i class="fa fa-user dot-success cl5" aria-hidden="true"></i>
			<span class="link_name cl">Accounts</span>
		</a>
	</li>
	<li class="list" onclick="window.location.href='/khvetsiemreap/Table/TablesManage'" title="Tables">
		<a class="link-href" href="/khvetsiemreap/Table/TablesManage">
			<i class="fa fa-table cl6" aria-hidden="true"></i>
			<span class="link_name cl">Tables</span>
		</a>
	</li>
	<li class="list" onclick="window.location.href='/khvetsiemreap/Setting/Index'" title="Settings">
		<a class="link-href" href="/khvetsiemreap/Setting/Index">
			<i class="fa fa-cog cl7" aria-hidden="true"></i>
			<span class="link_name cl">Settings</span>
		</a>
	</li>
	<li  class="list" onclick="Logout()">
		<a class="link-href" href="#">
			<i class="fa fa-sign-out cl8" aria-hidden="true"></i title="Logout">
			<span class="link_name cl">Logout</span>
		</a>
	</li>
</ul>


<script>
	function Logout() {
		if (confirm('Do you want to leave ?')) {
			window.location.href = '/khvetsiemreap/Account/Logout';
		}
	}

	$(document).ready(function() {
		let url = window.location.href;
		$('.list .link-href').each(function() {
			if (this.href === url) {
				$(this).closest('.list').addClass('actived');
				settitlepage = $('.actived .link-href .link_name').text();
				localStorage.setItem("title_page", settitlepage);

			}
		});		

	
	});
</script>