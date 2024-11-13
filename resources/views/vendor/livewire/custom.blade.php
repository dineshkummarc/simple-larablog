@php
    if (!isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet =
        $scrollTo !== false
            ? `(\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()`
            : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <ul class="page-numbers">
            @if (!$paginator->onFirstPage())
                <li>
                    <a href="javascript:void(0)"
                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"
                                wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                                <a href="javascript:void(0)">{{ $page }}</a>
                            </li>
                        @else
                            <li wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                                <a href="javascript:void(0)"
                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            @if ($paginator->hasMorePages())
                <li><a href="javascript:void(0)"
                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                        <i class="fa fa-angle-double-right"></i>
                    </a></li>
            @endif
        </ul>
    @endif
</div>
