	
<div class="container mt-4">
    @livewire('load-more-companies-data')
</div>

@livewireScripts
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };

    </script>
