<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="{!! route('cabinet_index') !!}">

                <b><img src="/images/logo.png" alt="homepage" class="dark-logo" /></b>


                <span><img src="/images/logo-text.png" alt="homepage" class="dark-logo" /></span>
            </a>
        </div>

        <div class="navbar-collapse">
            @include('cabinet.blocks.top-nav-menu')
            @include('cabinet.blocks.top-social-menu')
        </div>
    </nav>
</div>
