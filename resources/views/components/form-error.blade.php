 <div>
    <h3>Aqui se muestran los errores (con componente)</h3>
    @if ($errors->any())
        <div style="color: red; font-size: 0.9em;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>