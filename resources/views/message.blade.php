<div class="jsMessage">
    @if(Session::has('flashInfo'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('flashInfo') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </p>
    @elseif(Session::has('flashSuccess'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
            {{ Session::get('flashSuccess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </p>
    @elseif(Session::has('flashWarning'))
        <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">
            {{ Session::get('flashWarning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </p>
    @elseif(Session::has('flashError'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
            {{ Session::get('flashError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </p>
    @endif
    <p class="alert" style="display: none;"></p>
</div>
