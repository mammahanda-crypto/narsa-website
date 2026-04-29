@extends('layouts.app')

@section('content')
<div class="narsa-container">

    <h1 class="narsa-title">Documents officiels à imprimer</h1>

    <div class="documents-grid">

        @for ($i = 1; $i <= 4; $i++)
            <div class="doc-card">
                <div class="doc-paper">
                    <!-- هنا تقدر تحط contenu dyal document -->
                </div>
                <span class="doc-label">Document {{ $i }}</span>
            </div>
        @endfor

    </div>

    <div class="print-zone">
        <button onclick="window.print()" class="btn-print">
            🖨️ Imprimer les documents
        </button>
    </div>

</div>
@endsection