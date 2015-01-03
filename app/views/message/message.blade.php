@if (Session::has('flash_notification.message'))

    <div class="alert alert-{{ Session::get('saphira.flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('saphira.flash_notification.message') }}
    </div>
@endif
