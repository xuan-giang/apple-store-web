{{--<div class="row">--}}
{{--    <div class="col-lg-12">--}}
{{--        <div class="product__pagination">--}}
{{--            <a class="active" href="#">1</a>--}}

{{--            <a href="#">2</a>--}}
{{--            <a href="#">3</a>--}}
{{--            <span>...</span>--}}
{{--            <a href="#">21</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


@if ($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12">
            <div class="product__pagination">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a  aria-hidden="true">&lsaquo;</a>
            @else
                <a   href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active"   aria-current="page"><span>{{ $page }}</span></a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            @else
                <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </a>
            @endif


            </div>
        </div>
    </div>

@endif
