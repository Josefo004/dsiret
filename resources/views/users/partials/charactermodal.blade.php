<div id="cmodal" class="modal fade" tabindex="-1" aria-labelledby="cModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cModalLabel">Selecciona un personaje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          @for($i = 1; $i <= 5; $i+=+1) <div class="col-md-3">
            @if($i==1)
            <input type="radio" name="personajes" class="input-hidden" id="gadch{{$i}}" value="gadch{{$i}}" checked />
            @else
            <input type="radio" name="personajes" class="input-hidden" id="gadch{{$i}}" value="gadch{{$i}}" />
            @endif
            <label for="gadch{{$i}}">
              <img src="{{ asset('images/users/gadch'.$i.'.png') }}" class="img-thumbnail" />
            </label>
        </div>
        @endfor
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      <button type="button" id="upcharacter" class="btn btn-primary">Guardar personaje</button>
    </div>
  </div>
</div>
</div>