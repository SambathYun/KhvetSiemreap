<style type="text/css">
	<?php
	foreach ($data["GetTheme"] as $value) {
		echo '.bg1{
			background: ' . $value['color1'] . ' !important;
		}
		.bg2{
			background: ' . $value['color2'] . '!important;
			
		}
		.bg3{
			background: ' . $value['color3'] . '!important;
			
		}
		.cl{
			color: ' . $value['color4'] . ';
		}

		/* ============== side bar =========== */

		.nav-links {
			width: 100%;
			overflow: visible;
			list-style-type: circle;
			margin-block-start: 0em;
			margin-block-end: 0em;
			margin-inline-start: 0px;
			margin-inline-end: 0px;
			padding-inline-start: 0px;
	
		}
	
		.nav-links .list {
			border-radius: 5px;
			margin-top: 5px;
			margin-bottom: 5px;
			cursor: pointer;
		}
	
		.nav-links .list:hover {
			background-color: ' . $value['color3'] . ';
			
		}
	
		.nav-links .list a {
			min-width: 100%;
			padding: 15px 0px 10px 0px;
			align-items: center;
			text-decoration: none;
			list-style: none;
			color: #ffff;
			border-radius: 5px;
		}
	
		.nav-links .list a:hover {
			background-color: ' . $value['color3'] . ';
		}
	
		.nav-links .list i {
			height: 50px;
			min-width: 55px;
			text-align: center;
			line-height: 50px;
			font-size: 130%;
			cursor: pointer;
		}
	
		.actived {
			background-color: ' . $value['color3'] . ';
			border-radius: 5px;
		}

		/* ============== order card ============ */
		
		.card-orders {
			background: ' . $value['color3'] . '!important;
			border: 0.5px solid ' . $value['color3'] . ';
		}
		.card-orders:hover {
			border: 0.5px solid #ffff;
	
		}
	
		';
	}
	?>@media print {
		#checkout-box {
			display: none;
		}

		#inventory-wrapper {
			display: none;
		}

		#report-wrapper {
			display: none;
		}

		#sale-box {
			display: none;
		}
	}

	/* ===================== */

	.dot-pending {
		color: #f8ca30;
	}

	.dot-danger {
		color: #f8728a;
	}

	.dot-success {
		color: #0bcb90;
	}

	* {
		font-family: 'Arvo', serif;
	}

	.khmer-font {
		font: 20px Moul;
	}

	.khmer {
		font-family: 'Khmer', cursive !important;
	}

	.bgl {

		background: url('../public/images/background/background-login.jpg') no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}

	.bgh {
		color: #212529;
		list-style: none;
		background-clip: padding-box;
		border: 1px solid rgba(0, 0, 0, 0.075);
		border-radius: .40rem;
		background-color: rgba(255, 255, 255, 1);
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.075);

	}

	.bgh:hover {
		list-style: none;
		background-clip: padding-box;
		border-radius: .40rem;
		background-color: rgba(255, 255, 255, 1);
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.2);
	}

	/* ========== scroll hide ========= */

	.scroll_hide {
		overflow-y: scroll;
		scrollbar-width: none;
		/* Firefox */
	}

	.scroll_hide::-webkit-scrollbar {
		/* WebKit */
		width: 0;
		height: 0;
	}

	.hide-cursor {
		pointer-events: none !important;
	}

	/* ========= overflow text ======== */
	#text_wrapper {
		white-space: nowrap;
		overflow: hidden;
		box-sizing: border-box;
	}

	#text_overflow {
		display: inline-block;
		padding-left: 100%;
		animation: move 8s linear infinite;
	}

	@keyframes move {
		0% {
			transform: translate(0, 0);
		}

		100% {
			transform: translate(-100%, 0);
		}
	}

	/* ============= side =========== */

	.sidebar-1 {
		width: 72px;
		height: 100vh;
	}

	.sidebar-1.closed {
		height: 100vh;
		width: 320px;
		overflow: auto;
	}

	.sidebar-2 {
		height: 100vh;
		width: calc(100% - 72px);
	}

	.sidebar-2.change {
		height: 100vh;
		width: calc(100% - 320px);
	}

	.hide {
		display: none;
	}

	.sidebar-3 {
		height: 100vh;
		width: calc(100% - 320px);
		display: none;
	}

	.sidebar-4 {
		height: 100vh;
		width: 320px;
		display: none;
	}

	/* ============ menu food ============ */

	.menu-container {
		display: flex;
		align-items: center;
		justify-content: space-between;
		height: 45px;
	}

	#menu-wrapper {
		display: flex;
		width: 100%;
		height: 45px;
		overflow-y: scroll;
		scrollbar-width: none;
	}

	#menu-wrapper.smooth {
		scroll-behavior: smooth;
	}

	#menu-wrapper::-webkit-scrollbar {
		display: none;
	}

	#menu-items {
		width: 1000px;
		white-space: nowrap;
		height: 45px;
	}

	.arrow {
		display: none;
		width: 40px;
		z-index: 100;
		cursor: pointer;
		color: #212529;
		text-align: center;
		line-height: 45px;
	}

	.arrow.visible {
		display: block;
	}

	.arrow.left {
		left: 0;
	}

	.arrow.right {
		right: 0;
	}

	.nav {
		display: block;
		list-style-type: disc;
		margin-block-start: 0em;
		margin-block-end: 0em;
		margin-inline-start: 0px;
		margin-inline-end: 0px;
		padding-inline-start: 0px;
	}

	.item {
		display: inline-block;
	}

	.item span {
		display: block;
		text-decoration: none;
		list-style: none;
		height: 45px;
		margin: 0px 0px 0px 10px;
		padding: 10px 30px;
		border-radius: 100px;
		background: rgb(245, 245, 245);
		background-clip: padding-box;
		border: 1px solid rgba(0, 0, 0, 0.075);
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.075);
	}

	.menu-actived {
		background: #007286 !important;
		color: #fff;
	}

	.item span:hover {
		background-color: rgb(232, 232, 232);
	}

	/* ================ product ============ */

	.product-wrapper {
		display: grid;
		margin: 0 auto;
		width: 100%;
		grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
		grid-auto-rows: 200px;
		grid-gap: 5px;
	}
	
	#product-box {
		height: calc(100vh - 100px);
		overflow-y: auto;
		padding-left: 10px;
		padding-bottom: 20px;
		margin-top: 10px;
	}

	.square {
		width: 150px;
		height: 100px;
		overflow: hidden;
	}

	.img-pro {
		height: 100%;
		width: 100%;
		object-fit: cover;
	}

	/* ============ side3 search ============ */

	.search_container {
		float: left;
		width: 350px;
		height: 45px;
		display: flex;
		border-radius: 6px;
	}

	.search_sale {
		width: 200px;
		height: 40px;
		display: flex;
		border-radius: 6px;
	}

	/* ===========table responsive =========== */

	.table-checkout {
		width: 800px;
		margin: 0 auto;
		font-size: 80%;
	}

	.table-sales {
		width: 800px;
		margin: 0 auto;
		font-size: 80%;
	}

	.table-reports {
		width: 800px;
		margin: 0 auto;
		font-size: 80%;
	}

	.table-products {
		width: 900px;
		margin: 0 auto;
		font-size: 80%;
	}

	.table-addproduct {
		width: 500px;
		margin: auto;
		font-size: 80%;
	}

	.table-editproduct {
		width: 500px;
		margin: auto;
		font-size: 80%;
	}

	.table-accounts {
		width: 900px;
		margin: 0 auto;
		font-size: 80%;
	}

	.table-accounts .col-action {
		width: 21%;
	}

	.table-addaccount {
		width: 500px;
		margin: auto;
		font-size: 80%;
	}

	.table-editaccount {
		width: 500px;
		margin: auto;
		font-size: 80%;
	}

	.table-tables {
		width: 600px;
		margin: 0 auto;
		font-size: 80%;

	}

	.table-settings {
		width: 700px;
		margin: 0 auto;
		font-size: 80%;
	}

	/* ============ public class ===========*/

	.eng_name {
		position: absolute;
		top: 33px;
		left: 45px;
		margin: 0;
		font-size: 80%;
		opacity: 0.8;
		font-family: 'Khmer', cursive !important;
	}

	.btn-all {
		font-size: 100%;
	}

	.header-text {
		font-size: 120%;
		padding-top: 5px;
	}

	.cursor {
		cursor: pointer !important;
	}

	.cl1 {
		color: #e83e8c;
	}

	.cl2 {
		color: #007bff;
	}

	.cl3 {
		color: #fd7e14;
	}

	.cl4 {
		color: #17a2b8;
	}

	.cl5 {
		color: #ffc107;
	}

	.cl6 {
		color: #28a745;
	}

	.cl7 {
		color: #6f42c1;
	}

	.cl8 {
		color: #dc3545;
	}

	/* ========= start end =========== */

	.date-container {
		position: relative;
	}

	.input-date {
		width: 200px;
		height: 40px;
		border-radius: 0.25rem;
		cursor: pointer;
	}

	.date-button {
		position: absolute;
		top: 7px;
		right: 6px;
		width: 25px;
		height: 25px;
		background: #fff;
		pointer-events: none;
	}

	.date-button button {
		border: none;
		background: transparent;
	}

	/* ========= Ruler under text =========*/
	.text-underline {
		background-image:
			linear-gradient(transparent 0%,
				transparent 90%,
				hotpink 90%,
				hotpink 100%);
		background-repeat: no-repeat;
		background-size: 0% 100%;
		background-position-x: right;
		transition: background-size 300ms;

	}

	.text-underline:hover {
		background-size: 100% 100%;
		background-position-x: left;
	}

	.alert-success a {
		list-style: none;
		text-decoration: none;
	}

	/* ================================*/

	@media (max-width: 575.98px) {
		#product-box {
			height: calc(100vh - 131px);
			overflow-y: auto;
		}

		.product-wrapper {
			grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
		}

		/* ============side1 2 ==============*/
		.sidebar-1.closed {
			height: 100vh;
			width: 72px;
		}

		.sidebar-2.change {
			height: 100vh;
			width: calc(100% - 72px);
		}

		.link_name {
			display: none;
		}

		#logo1 {
			display: none;
		}

		#logo2 {
			display: block !important;
		}

		/* ============side 3 =============*/

		.sidebar-3 {
			width: 100%;
		}

		.search_container {
			width: 100%;
		}

		.product_container {
			padding-top: 0.5rem;
			clear: left;
		}

		/* ===============side 4 ============*/

		.sidebar-4 {
			width: 100%;
			z-index: 999;
		}

		.sidebar-4 {
			width: 100%;

		}

		/* .table-checkout {

		} */

		/* .table-reports {

		} */

		/* .table-products {

		} */

		.table-addproduct {
			width: 100%;
		}

		.table-editproduct {
			width: 100%;
		}

		.table-editaccount {
			width: 100%;
		}

		/* .table-sales {

		} */

		/* .table-accounts {

		} */
		.table-addaccount {
			width: 100%;
		}

		/* .table-tables {

		} */
		/* .table-settings {

		} */

		/* =============== modal ===============*/

		.modal-content {
			margin: 15% auto auto auto !important;
			max-width: 70%;
		}

		.modal-btn {
			font-size: 100%;
		}

		/* =========== public class ============*/

		.btn-all {
			font-size: 90%;
		}

		#toggle-bar {
			display: none;
		}

		.pos-text {
			font-size: 80%;
		}

		.header-text {
			padding-top: 10px;
			font-size: 100%;
		}

		.input-date {
			width: 100%;
		}

	}

	@media (max-width: 768.98px) and (min-width: 576px) {

		#product-box {
			height: calc(100vh - 131px);
			overflow-y: auto;
		}

		.sidebar-2.change {
			position: relative;
			transform: translateX(0);
		}

		.sidenav__close-icon {
			visibility: hidden;
		}

		/* ============side 1 2 ==============*/

		.sidebar-1.closed {
			height: 100vh;
			width: 72px;
		}

		.sidebar-2.change {
			height: 100vh;
			width: calc(100% - 72px);
		}

		.link_name {
			display: none;
		}

		#logo1 {
			display: none;
		}

		#logo2 {
			display: block !important;
		}

		/* ============side 3 ==============*/

		.sidebar-3 {
			width: 100%;
		}

		.search_container {
			width: 100%;
		}

		.product_container {
			padding-top: 0.5rem;
			clear: left;
		}

		/* ============== side 4 ============*/

		.sidebar-4 {
			width: 100%;
			clear: both;
		}

		.sidebar-4 {
			height: 100vh;
			width: 100%;
		}


		/* ============== table =============*/

		.table-checkout {
			width: 100%;
		}

		.table-reports {
			width: 100%;
		}

		.table-products {
			margin: auto;
		}

		.table-products .col-action {
			width: 19%;
		}

		.table-sales {
			width: 100%;
		}

		/* .table-accounts {
			width: 100%;
		} */
		.table-accounts .col-action {
			width: 19%;
		}

		.table-tables {
			width: 100%;
		}

		.table-tables .col-action {
			width: 37%;
		}

		.table-settings {
			width: 100%;

		}

		/* =============== modal ================  */

		.modal-content {
			margin: 12% auto auto auto !important;
			max-width: 70%;
		}

		.modal-btn {
			font-size: 100%;
		}

		/* ============= public class ============ */

		.btn-all {
			font-size: 90%;
		}

		#toggle-bar {
			display: none;
		}

		.pos-text {
			font-size: 80%;
		}

		.header-text {
			padding-top: 10px;
			font-size: 100%;
		}

	}

	@media (max-width: 991.98px) and (min-width: 768px) {

		#product-box {
			height: calc(100vh - 131px);
			overflow-y: auto;
		}

		.sidebar-1.closed {
			height: 100vh;
			width: 72px;
		}

		.sidebar-2.change {
			height: 100vh;
			width: calc(100% - 72px);
		}

		.link_name {
			display: none;
		}

		#logo1 {
			display: none;
		}

		#logo2 {
			display: block !important;
		}

		/* ============= side 3 ============== */

		.search_container {
			width: 100%;
		}

		.product_container {
			padding-top: 0.5rem;
			clear: left;
		}

		/* =============== table ============== */

		.table-checkout {
			width: 100%;
		}

		.table-reports {
			width: 100%;
		}

		/* .table-products {
			width: 100% !important;
		} */
		.table-products .col-action {
			width: 22%;
		}

		.table-sales {
			width: 100%;
		}

		/* .table-accounts {
			width: 100%;
		} */
		.table-accounts .col-action {
			width: 22%;
		}

		/* .table-tables {
			width: 100%;
		} */
		.table-tables .col-action {
			width: 30%;
		}

		.table-settings {
			width: 100%;
		}

		/* ============ public class =========== */

		.modal-content {
			margin: 10% auto auto auto !important;
			max-width: 70%;
		}

		#toggle-bar {
			display: none;
		}

		.end_date {
			clear: both;
		}

		.find_report {
			clear: both;
		}

	}

	@media (max-width: 1199.98px) and (min-width: 992px) {
		#product-box {
			height: calc(100vh - 90px);
			overflow-y: auto;
		}

		.sidebar-1.closed {
			height: 100vh;
			width: 72px;
		}

		.sidebar-2.change {
			height: 100vh;
			width: calc(100% - 72px);
		}

		.link_name {
			display: none;
		}

		#logo1 {
			display: none;
		}

		#logo2 {
			display: block !important;
		}

		#toggle-bar {
			display: none;
		}

		.modal-content {
			margin: 7% auto auto auto !important;
			max-width: 70%;
		}

	}

	@media (min-width: 1200px) {}

	/* ============== scroll bar style =============*/
	::-webkit-scrollbar {
		width: 18px;
	}

	::-webkit-scrollbar-track {
		background-color: transparent;
	}

	::-webkit-scrollbar-thumb {
		background-color: #d6dee1;
		border-radius: 20px;
		border: 6px solid transparent;
		background-clip: content-box;
	}

	::-webkit-scrollbar-thumb:hover {
		background-color: #a8bbbf;
	}

	#table {
		table-layout: fixed;
		word-wrap: break-word;
		vertical-align: middle;
	}

	#table tr th td {
		vertical-align: middle;
	}

	/* ================= modal dialog============== */

	.animate-top {
		position: relative;
		animation: animatetop 0.4s
	}

	@keyframes animatetop {
		from {
			top: -300px;
			opacity: 0
		}

		to {
			top: 0;
			opacity: 1
		}
	}

	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0, 0, 0);
		background-color: rgba(0, 0, 0, 0.4);
	}

	.modal-content {
		margin: 5% 25% 8% auto;
		border: 1px solid #888;
		width: 475px;
		background-color: #fff;
		border: 1px solid rgba(0, 0, 0, .2);
		border-radius: .3rem;
		outline: 0;
	}

	/* ============== invoice ============ */

	.khmertext {
		font-family: 'Khmer', cursive !important;
		font-size: 12px;
	}

	#invoice-POS {
		/* 	box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
		background: #FFF; 
    	padding: 2mm;*/
    	/* margin: 0 auto; */
		width: 80mm;
	}

	.contenttext {
		font-size: 12px;
	}

	.subtext {
		font-size: 13px;
	}

	.table-invoice {
		width: 100% !important;
		table-layout: fixed;
		border-collapse: collapse;
		word-wrap: break-word;
	}

	.tabletitle {
		font-size: 12px;
		display: block;
		margin-block-start: 0.83em;
		margin-block-end: 0.83em;
		margin-inline-start: 0px;
		margin-inline-end: 0px;
		font-weight: bold;
	}

	.itemtext {
		font-family: 'Khmer', cursive !important;
		font-size: 12px;
		margin-bottom: 0px;
		padding: 0px 0 0px 0px;
	}


</style>