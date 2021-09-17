
@if ($paginator->hasPages())
<div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5">
                        <span>@lang('admin.Showing')</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>@lang('admin.to') </span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>@lang('admin.of')</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>@lang('admin.results') </span>
                    </p>
                </div>
<div class="dataTables_paginate paging_simple_numbers" id="dataTableBuilder_paginate">
    <ul class="pagination">
       
        @if ($paginator->onFirstPage())
            <li class="paginate_button previous disabled" id="dataTableBuilder_previous"><a>@lang('admin.Previous')</a></li>
        @else
            <li class="paginate_button previous disabled" id="dataTableBuilder_previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-controls="dataTableBuilder" data-dt-idx="0" tabindex="0">← @lang('admin.Previous')</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="paginate_button next disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button active"><a><span>{{ $page }}</span></a></li>
                    @else
                        <li class="paginate_button "><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="paginate_button next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('admin.Next') →</a></li>
        @else
            <li class="paginate_button next disabled"><a><span>@lang('admin.Next') →</span></a></li>
        @endif
    </ul>
</div>    
@endif 