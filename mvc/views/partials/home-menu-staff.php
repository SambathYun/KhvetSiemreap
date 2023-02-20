<ul class="nav-links" class="cl">

	<li class="list" onclick="window.location.href='/khvetsiemreap/Sales/SalesManage'" title="Sales">
		<a class="link-href" href="/khvetsiemreap/Sales/SalesManage">
			<i class="fa fa-shopping-cart cl1" aria-hidden="true"></i>
			<span class="link_name cl">Sales</span>
		</a>
	</li>

	<li class="list" onclick="window.location.href='/khvetsiemreap/Report/ReportManage'" title="Reports">
		<a class="link-href" href="/khvetsiemreap/Report/ReportManage">
			<i class="fa fa-bar-chart cl2" aria-hidden="true"></i>
			<span class="link_name cl">Reports</span>
		</a>

	</li>
	
	<li class="list" onclick="window.location.href='/khvetsiemreap/Product/ProductsManage'">
		<a class="link-href" href="/khvetsiemreap/Product/ProductsManage">
			<i class="fa fa-cutlery cl3" aria-hidden="true"></i>
			<span class="link_name">Products</span>
		</a>
	</li>
	<li class="list" onclick="window.location.href='/khvetsiemreap/Inventory/InventorysManage'">
		<a class="link-href" href="/khvetsiemreap/Inventory/InventorysManage">
			<i class="fa fa-file-text cl4" aria-hidden="true"></i>
			<span class="link_name">Inventorys</span>
		</a>
	</li>
	<li class="list" onclick="window.location.href='/khvetsiemreap/Setting/Index'">
		<a class="link-href" href="/khvetsiemreap/Setting/Index">
			<i class="fa fa-cog cl7" aria-hidden="true"></i>
			<span class="link_name">Settings</span>
		</a>
	</li>
	<li class="list" onclick="Logout()">
		<a class="link-href" href="#">
			<i class="fa fa-sign-out cl8" aria-hidden="true"></i>
			<span class="link_name">Logout</span>
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