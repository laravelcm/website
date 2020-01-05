<!-- begin::Offcanvas Toolbar Quick Actions -->
<div id="kt_offcanvas_toolbar_quick_actions" class="kt-offcanvas-panel">
	<div class="kt-offcanvas-panel__head">
		<h3 class="kt-offcanvas-panel__title">Actions Rapides</h3>
		<a href="#" class="kt-offcanvas-panel__close" id="kt_offcanvas_toolbar_quick_actions_close"><i class="flaticon2-delete"></i></a>
	</div>
	<div class="kt-offcanvas-panel__body">
		<div class="kt-grid-nav-v2">
			<a href="#" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon2-list"></i></div>
				<div class="kt-grid-nav-v2__item-title">Articles</div>
			</a>
			<a href="{{ route('admin.setting.index') }}" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon2-settings"></i></div>
				<div class="kt-grid-nav-v2__item-title">{{ __('setting::menus.backend.title') }}</div>
			</a>
		</div>
	</div>
</div>

<!-- end::Offcanvas Toolbar Quick Actions -->
